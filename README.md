# Laravel Permission Editor: Manage Roles and Permissions with Ease

This package offers a visual interface to manage roles and permissions within your Laravel application, built on top of the Spatie Laravel Permission package.

## Key Features

- Effortlessly manage roles and permissions through a visual interface
- No coding required
- Quick setup and integration
- Streamline user access control

## Getting Started

1. **Install Spatie Laravel Permission:**
   - Follow the instructions to install and configure the Spatie Laravel Permission package in your project.

2. **Install Laravel Permission Editor:**
   - Run the following command in your terminal:

     ```bash
     composer require simplysamin/laravel-permission-editor
     ```

3. **Publish Assets and Config:**
   - Run this command to make the package's resources available:

     ```bash
     php artisan vendor:publish --provider="Simplysamin\LaravelPermissionEditor\PermissionEditorServiceProvider"
     ```
  
4. **Access the Interface:**
   - Open your browser and navigate to `/permission-editor/roles` to start managing roles and permissions.

## Security Tip

- Consider adding authentication middleware (like `auth`) to protect the routes within the published `config/permission-editor.php` file.

