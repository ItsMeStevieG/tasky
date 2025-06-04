# Tasky Development TODO

Below is a sequential list of upcoming features and improvements for Tasky. Each item is dependency-aware and broken down into smaller tasks where applicable.

1. [ ] **Move Configuration to Environment Variables**
    - [ ] Load database credentials from `.env` rather than `config.php`.
    - [ ] Update documentation with setup instructions.

2. [ ] **Task Management Basics**
    - [ ] Design `tasks` table with fields for title, description, due date, assignee, priority, and project.
    - [ ] Implement CRUD operations for tasks in the UI.

3. [ ] **Subtasks and Dependencies**
    - [ ] Add `subtasks` table linking child tasks to parents.
    - [ ] Allow tasks to reference prerequisite tasks before starting.

4. [ ] **Recurring Tasks and Reminders**
    - [ ] Create scheduling logic for repeating tasks.
    - [ ] Send reminder notifications prior to due dates.

5. [ ] **Notifications System**
    - [ ] Store user notification preferences.
    - [ ] Deliver email or in-app alerts for task updates and reminders.

6. [ ] **Collaboration Enhancements**
    - [ ] Allow file attachments on tasks.
    - [ ] Support rich-text notes using a WYSIWYG editor.

7. [ ] **Calendar and Timeline Views**
    - [ ] Implement calendar view to display tasks by date.
    - [ ] Create Gantt-style timeline for visualizing task schedules and dependencies.

8. [ ] **Projects and Boards**
    - [ ] Permit a task to belong to multiple projects.
    - [ ] Extend board view to manage cross-project tasks.

9. [ ] **Custom Fields and Forms**
    - [ ] Let admins define custom fields for projects and tasks.
    - [ ] Build forms that external users can submit into a project.

10. [ ] **Reporting and Dashboards**
     - [ ] Add charts summarizing hours by user, project, or tag.
     - [ ] Provide search and filtering to generate custom reports.
     - [ ] Introduce portfolios/goals for tracking multiple projects.

11. [ ] **Integrations and API**
     - [ ] Expose REST API endpoints for tasks and time entries.
     - [ ] Provide webhooks so external services can react to updates.

12. [ ] **Automation Rules**
     - [ ] Allow users to define simple triggers and actions (e.g., move task when marked done, send notification when billable).

13. [ ] **Workload & Resource Management**
     - [ ] Track estimated hours per assignee.
     - [ ] Display team workload to avoid overbooking.

14. [ ] **Security Enhancements**
     - [ ] Implement password reset flow.
     - [ ] Optionally support two-factor authentication.

15. [ ] **Testing and CI**
     - [ ] Add unit and integration tests for core modules.
     - [ ] Set up continuous integration to run tests automatically.
