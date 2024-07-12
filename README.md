# Employee Leave Management System

## Introduction

The Employee Leave Management System is a comprehensive web application designed to streamline the process of managing employee leave requests. This system allows administrators to efficiently manage employee details, create user accounts, and handle leave approvals or rejections. Employees can easily log in to the system, apply for leaves, and track the status of their applications. 

## Features

### Admin Features
1. **Employee Management**: 
   - Add new employees to the system.
   - Update or delete existing employee records.
   - Assign roles and permissions to employees.
2. **User Account Creation**:
   - Create login accounts for employees.
   - Set usernames, passwords, and privilege levels (admin or employee).
   - Manage active and inactive status of user accounts.
3. **Leave Management**:
   - View all leave applications.
   - Approve or reject leave requests.
   - Track the status of leave requests (pending, approved, rejected).
4. **Dashboard**:
   - Visualize employee status and leave request status using charts.
   - Display pending, approved, and rejected leave requests.
   - Show active and inactive employee statistics.

### Employee Features
1. **Login**:
   - Secure login with username and password.
   - Forgot password functionality to reset passwords.
2. **Leave Application**:
   - Apply for leave by filling out a simple form.
   - Specify leave type, start date, end date, and reason.
   - View the status of submitted leave applications.
3. **Profile Management**:
   - View and update personal details.
   - Check leave balance and history.

## Technology Stack

- **Backend**: Laravel (PHP framework)
- **Frontend**: Bootstrap (CSS framework), JavaScript, SweetAlert2 for alerts
- **Database**: MySQL
- **Charts**: Chart.js for visual data representation

## Installation

1. **Clone the Repository**:
   ```sh
   git clone https://github.com/your-repo/employee-leave-management-system.git
