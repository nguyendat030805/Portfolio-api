# Contributing Guide

Welcome to the `my-project` repository! This document explains how to contribute with clear commit messages, branch naming, folder structure, and helpful project details.

## 1. Basic Contribution Workflow

1. Open a new issue or check existing issues before starting work.
2. Create a new branch from `main`.
3. Implement your changes, test them, and commit following the conventions.
4. Push the branch to the remote repository.
5. Open a pull request (PR) with a clear description and testing instructions.

## 2. Branch Naming Convention

Use a clear and concise branch name with one of these prefixes:

- `feature/<short-description>`: for new features
- `fix/<short-description>`: for bug fixes
- `hotfix/<short-description>`: for urgent bug fixes
- `refactor/<short-description>`: for code refactoring without behavior changes
- `docs/<short-description>`: for documentation updates
- `test/<short-description>`: for adding or updating tests

Examples:
- `feature/login-google`
- `fix/user-validation`
- `refactor/auth-logic`

## 3. Commit Message Convention

Write commit messages clearly using a Conventional Commits style:

```
<type>(<scope>): <short description>

<more detailed explanation if needed>
```

Common types:

- `feat`: a new feature
- `fix`: a bug fix
- `docs`: documentation changes
- `style`: formatting changes that do not affect logic
- `refactor`: code refactoring
- `test`: adding or updating tests
- `chore`: maintenance tasks such as configuration or dependency updates

Examples:

```
feat(auth): add Google login
fix(user): fix duplicate email validation
docs(readme): update setup instructions
```

## 4. Main Project Structure

A quick overview of important folders in this project:

- `app/`
  - `app/features/`: application modules and main feature code.
  - `app/Providers/`: service providers, bindings, and app bootstrapping.
- `bootstrap/`
  - `bootstrap/app.php`: Laravel app bootstrap file.
  - `bootstrap/providers.php`: additional provider configuration.
- `config/`: Laravel configuration files like `app.php`, `database.php`, and `session.php`.
- `database/`
  - `factories/`: model factories for tests.
  - `migrations/`: database migration files.
  - `seeders/`: seed data for initial setup.
- `public/`: public assets and entry point `index.php`.
- `resources/`
  - `css/`, `js/`: front-end source files and Vite resources.
  - `views/`: Blade templates.
- `routes/`
  - `web.php`: user-facing web routes.
  - `api.php`: API routes.
- `storage/`: uploads, cache, sessions, and compiled view files.
- `tests/`: automated tests, including `Feature` and `Unit` tests.

## 5. Setup Steps

- Install PHP dependencies:
  ```bash
  composer install
  ```
- Install Node dependencies:
  ```bash
  npm install
  ```
- Run database migrations and seeders if needed:
  ```bash
  php artisan migrate
  php artisan db:seed
  ```
- Start the frontend development server:
  ```bash
  npm run dev
  ```

## 6. Testing and Code Quality

- Run PHP tests:
  ```bash
  vendor/bin/phpunit
  ```
- If available, run PHP style checks:
  ```bash
  vendor/bin/pint
  ```
- Verify frontend build:
  ```bash
  npm run build
  ```

## 7. Pull Request Notes

A good PR should include:

- A concise title that explains the purpose.
- A summary of the main changes.
- Testing instructions or commands used.
- A link to related issues if applicable.

## 8. General Guidelines

- Write clean, readable, and maintainable code.
- Prefer reusable solutions and avoid duplicate logic.
- Add tests for important behavior or structural changes.
- Keep each change focused on the issue being solved.
- Ask for feedback in the PR if you are unsure.

## 9. Additional Notes

- If you are new, start with a small task or simple issue.
- Ask clear questions in issues or PR comments when you need help.
- Keep your branch up to date with `main` before merging.

Thank you for contributing! We appreciate every improvement and community support.
