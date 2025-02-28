var neonRegister = neonRegister || {};;
(function($, window, undefined) {
    "use strict";
    $(document).ready(function() {
        $("input#email").val('');
        $("input#password").val(''),
        neonRegister.$container = $("#form_register");
        neonRegister.$steps = neonRegister.$container.find(".form-steps");
        neonRegister.$steps_list = neonRegister.$steps.find(".step");
        neonRegister.step = 'step-1';
        neonRegister.$container.validate({
            rules: {
                fName: {
                    required: true
                },
                lName: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                },
            },
            messages: {
                email: {
                    email: 'Invalid E-mail.'
                }
            },
            highlight: function(element) {
                $(element).closest('.input-group').addClass('validate-has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.input-group').removeClass('validate-has-error');
            },
            submitHandler: function(ev) {
                $(".login-page").addClass('logging-in');
                neonRegister.setPercentage(30, function() {
                    neonRegister.setPercentage(98, function() {
                        $.ajax({
                            url: '/signup',
                            method: 'post',
                            dataType: 'json',
                            data: {
                                fName: $("input#fName").val(),
                                lName: $("input#lName").val(),
                                phone: $("input#phone").val(),
                                email: $("input#email").val(),
                                password: $("input#password").val(),
                                passwordConfirm: $("input#passwordRepeat").val()
                            },
                            success: function(response) {
                                if(response.theme == 'success'){
                                neonRegister.setPercentage(100);
                                setTimeout(function() {
                                    $(".login-page .login-header .description").slideUp();
                                    neonRegister.$steps.slideUp('normal', function() {
                                        $(".login-page").removeClass('logging-in');
                                        $(".form-register-success").slideDown('normal');
                                    });
                                }, 1000);
                                }
                                if(response.theme == 'error'){
                                    $('#loginForm').slideDown();
                                    $(".login-page").removeClass('logging-in');
                                    $('#processProc').html('0%');
                                    $('#process').css('width','0%');
                                    var errorString = '';
                                    $.each( response.more.errors, function( key, value) {
                                        errorString += '<p>' + value + '</p>';
                                    });
                                    showNotify({theme:"error",title:errorString});
                                }
                            }
                        });
                    });
                });
            }
        });
        neonRegister.$steps.find('[data-step]').on('click', function(ev) {
            ev.preventDefault();
            var $current_step = neonRegister.$steps_list.filter('.current'),
                next_step = $(this).data('step'),
                validator = neonRegister.$container.data('validator'),
                errors = 0;
            neonRegister.$container.valid();
            errors = validator.numberOfInvalids();
            if (errors) {
                validator.focusInvalid();
            } else {
                var $next_step = neonRegister.$steps_list.filter('#' + next_step),
                    $other_steps = neonRegister.$steps_list.not($next_step),
                    current_step_height = $current_step.data('height'),
                    next_step_height = $next_step.data('height');
                TweenMax.set(neonRegister.$steps, {
                    css: {
                        height: current_step_height
                    }
                });
                TweenMax.to(neonRegister.$steps, 0.6, {
                    css: {
                        height: next_step_height
                    }
                });
                TweenMax.to($current_step, .3, {
                    css: {
                        autoAlpha: 0
                    },
                    onComplete: function() {
                        $current_step.attr('style', '').removeClass('current');
                        var $form_elements = $next_step.find('.form-group');
                        TweenMax.set($form_elements, {
                            css: {
                                autoAlpha: 0
                            }
                        });
                        $next_step.addClass('current');
                        $form_elements.each(function(i, el) {
                            var $form_element = $(el);
                            TweenMax.to($form_element, .2, {
                                css: {
                                    autoAlpha: 1
                                },
                                delay: i * .09
                            });
                        });
                        setTimeout(function() {
                            $form_elements.add($next_step).add($next_step).attr('style', '');
                            $form_elements.first().find('input').focus();
                        }, 1000 * (.5 + ($form_elements.length - 1) * .09));
                    }
                });
            }
        });
        neonRegister.$steps_list.each(function(i, el) {
            var $this = $(el),
                is_current = $this.hasClass('current'),
                margin = 20;
            if (is_current) {
                $this.data('height', $this.outerHeight() + margin);
            } else {
                $this.addClass('current').data('height', $this.outerHeight() + margin).removeClass('current');
            }
        });
        neonRegister.$body = $(".login-page");
        neonRegister.$login_progressbar_indicator = $(".login-progressbar-indicator h3");
        neonRegister.$login_progressbar = neonRegister.$body.find(".login-progressbar div");
        neonRegister.$login_progressbar_indicator.html('0%');
        if (neonRegister.$body.hasClass('login-form-fall')) {
            var focus_set = false;
            setTimeout(function() {
                neonRegister.$body.addClass('login-form-fall-init')
                setTimeout(function() {
                    if (!focus_set) {
                        neonRegister.$container.find('input:first').focus();
                        focus_set = true;
                    }
                }, 550);
            }, 0);
        } else {
            neonRegister.$container.find('input:first').focus();
        }
        $.extend(neonRegister, {
            setPercentage: function(pct, callback) {
                pct = parseInt(pct / 100 * 100, 10) + '%';
                neonRegister.$login_progressbar_indicator.html(pct);
                neonRegister.$login_progressbar.width(pct);
                var o = {
                    pct: parseInt(neonRegister.$login_progressbar.width() / neonRegister.$login_progressbar.parent().width() * 100, 10)
                };
                TweenMax.to(o, .7, {
                    pct: parseInt(pct, 10),
                    roundProps: ["pct"],
                    ease: Sine.easeOut,
                    onUpdate: function() {
                        neonRegister.$login_progressbar_indicator.html(o.pct + '%');
                    },
                    onComplete: callback
                });
            }
        });
    });
})(jQuery, window);