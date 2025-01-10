
# Exslife

Exslife is a platform designed for creating tasks on VKontakte (VK), the popular Russian social networking service. This repository contains the source code for the Exslife platform.

## Features

- **Task Creation**: Allows users to create and manage tasks on VK.
- **Integration with VK API**: Utilizes VK's API to interact with the platform.
- **User Authentication**: Supports user authentication to securely access VK accounts.

## Technologies Used

- **PHP**: Server-side scripting language for backend development.
- **Laravel Framework**: PHP framework used for building the application.
- **JavaScript**: For client-side scripting.
- **HTML/CSS**: For structuring and styling the web interface.

## Installation

To set up the Exslife platform locally, follow these steps:

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/mikield/exslife.git
   ```

2. **Navigate to the Project Directory**:
   ```bash
   cd exslife
   ```

3. **Install Dependencies**:
   Ensure you have [Composer](https://getcomposer.org/) installed, then run:
   ```bash
   composer install
   ```

4. **Set Up Environment Variables**:
   Copy the example environment file and modify it as needed:
   ```bash
   cp .env.example .env
   ```
   Update the `.env` file with your database and VK API credentials.

5. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

6. **Run Database Migrations**:
   ```bash
   php artisan migrate
   ```

7. **Start the Development Server**:
   ```bash
   php artisan serve
   ```
   The application should now be accessible at `http://localhost:8000`.

## Usage

After setting up the platform, you can:

- **Create VK Tasks**: Log in with your VK account and start creating tasks.
- **Manage Tasks**: View, edit, or delete existing tasks.
- **Monitor Task Progress**: Track the status of your tasks in real-time.

## Contributing

Contributions are welcome! Please fork this repository, make your changes, and submit a pull request. For major changes, open an issue first to discuss what you would like to change.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more information.

## Contact

For any inquiries or further information, please contact the repository owner through their GitHub profile: [mikield](https://github.com/mikield).

---

*Note: This project is maintained for archival purposes and may not be actively updated.*
