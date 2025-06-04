# Tasky Feature Overview

Tasky is a lightweight PHP-based time tracking application. Below is a summary of its main capabilities:

## Core Functionality
- **Authentication and User Management**: Secure login, CSRF protection, admin user management, and profile editing with image cropping.
- **Time Tracking**: Start and stop timers or manually log work hours.
- **Projects and Tags**: Create projects with client names and categorize entries with tags.
- **Task Management**: Assign tasks with due dates and priority levels.
- **Subtasks and Dependencies**: Organize tasks with parent-child links and prerequisites.
- **Recurring Tasks and Reminders**: Schedule repeating tasks and receive upcoming due-date notifications.
- **Notifications**: In-app alerts for task deadlines and updates.
- **File Attachments and Rich-Text Notes**: Upload files to tasks and format notes with a WYSIWYG editor.
- **CRUD Operations**: Create, read, update, and delete timesheet entries.
- **Comments**: Discussion threads on each entry for team collaboration.
- **Board View**: Simple Kanban board for moving entries through Todo, In Progress, and Done.

## Reporting and Exports
- Generate reports showing total hours by project with date range filters.
- Export report results to CSV for further analysis.

## Appearance and Customization
- Toggle between light and dark themes; preference is stored per user.
- Responsive layout built with Bootstrap 5 for mobile devices.

## Error Handling
- Custom error handler logs to `logs/php_errors.log` for easier debugging.

This file provides a concise reference for the features available in Tasky.
