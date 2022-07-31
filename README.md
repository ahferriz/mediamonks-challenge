
# This is a <b>media.monks</b> code challenge! 

## Core 

This is a tiny CMS web application that has articles and users with different roles and permissions. There are seeders that creates the users, permissions, roles and some articles. The default roles are:

- Admin: has permissions to see, create, edit, delete and restore deleted articles.
- Editor: has permissions to see and edit articles.
- User: only has permissions to see articles.

The authentication parts where created using Laravel's Breeze package.

## UI

The user interface was build using the CSS framework <b>Tailwind CSS</b> and livewire for a quick development workflow and an interactive experience.

## Tests 

Some tests where added to verify the roles and article rules. They are also an important part for the CI/CD as the code will only be deployed if all tests pass.

## Version control 

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
