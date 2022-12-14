
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

## CI

Added CI workflow with GitHub Actions to create an image and run all necessary tests after a push on the repository.

## CD

Added CD workflow with GitHub Actions to deploy the code to production on AWS when CI workflow completes successfully. In this specific case, the deployment is done directly with SSH as I have the free tier for EC2, but it can also be deployed to Elastic Beanstalk, ECR, ECS or many other ways.

