# GharSewa Project Analysis & Data Flow Documentation

## Project Overview

**GharSewa** is a comprehensive Laravel-based property management system designed to help property owners (especially those living abroad) manage their properties through professional maintenance services. The system facilitates scheduling, booking, and tracking of essential maintenance services through verified service providers.

## System Architecture Analysis

### Core Components

1. **Authentication & Authorization System**
   - Role-based access control (Admin, Service Provider, User)
   - Laravel Breeze for authentication
   - Custom middleware (`RoleManager`) for role management

2. **Property Management Module**
   - Property registration and management
   - Property ownership validation
   - Property-specific service booking

3. **Service Booking System**
   - Package-based service offerings
   - Booking request validation
   - Real-time booking status tracking

4. **Task Management System**
   - Admin task assignment to service providers
   - Task scheduling and tracking
   - Status updates and completion tracking

5. **Payment Processing**
   - Khalti payment gateway integration
   - Subscription and one-time payments
   - Payment verification and status tracking

6. **Notification System**
   - Email notifications for various events
   - Real-time status updates
   - Booking confirmations and task assignments

## Key Business Processes

### 1. User Registration & Property Setup
- Users register and create accounts
- Property owners add their properties to the system
- Properties are validated and stored for future bookings

### 2. Service Booking Workflow
1. User selects a property and service package
2. System validates property ownership
3. Booking request is created with "pending" status
4. Payment is processed through Khalti gateway
5. Upon successful payment, booking is confirmed

### 3. Admin Task Assignment
1. Admin reviews pending bookings
2. Selects appropriate service provider based on specialization
3. Schedules task with specific date/time
4. Creates task record and sends notifications
5. Updates booking status to "confirmed"

### 4. Service Provider Task Management
1. Service providers view assigned tasks
2. Update task progress and status
3. Mark tasks as completed with remarks
4. System notifies relevant parties of status changes

### 5. Payment & Billing
1. System generates payment requests for bookings
2. Integrates with Khalti payment gateway
3. Verifies payment status and updates records
4. Handles both successful and failed payment scenarios

## Database Schema Analysis

### Core Tables
- **users**: Central user management (admin, service_provider, user roles)
- **properties**: Property registration and details
- **packages**: Service packages with pricing and descriptions
- **bookings**: Service booking requests and status
- **booking_details**: Detailed booking information with provider assignments
- **tasks**: Task assignments and tracking
- **service_providers**: Service provider profiles and specializations
- **payments**: Payment records and transaction details
- **contacts**: Contact form submissions

### Key Relationships
- User → Properties (One-to-Many)
- User → Bookings (One-to-Many)
- Property → Bookings (One-to-Many)
- Package → Bookings (One-to-Many)
- Booking → BookingDetails (One-to-Many)
- Booking → Tasks (One-to-Many)
- Booking → Payments (One-to-Many)
- ServiceProvider → Tasks (One-to-Many)

## Technology Stack

### Backend
- **Framework**: Laravel 10+
- **Language**: PHP
- **Database**: MySQL/SQLite
- **Authentication**: Laravel Breeze
- **Payment**: Khalti API integration

### Frontend
- **Template Engine**: Blade
- **Styling**: Bootstrap/Tailwind CSS
- **JavaScript**: Basic JS for interactivity

### External Services
- **Payment Gateway**: Khalti
- **Email Service**: Laravel Mail system
- **File Storage**: Local filesystem

## Security Features

1. **Role-Based Access Control**: Custom middleware ensures users only access authorized resources
2. **Form Validation**: Comprehensive request validation for all input forms
3. **CSRF Protection**: Laravel's built-in CSRF protection
4. **Authentication**: Secure login/logout with email verification
5. **Payment Security**: Secure Khalti integration with verification

## Data Flow Characteristics

### Level 0 (Context Diagram)
- Shows system boundary and external entities
- Identifies main data flows between system and external actors
- Highlights integration with payment gateway and email services

### Level 1 (System Overview)
- Breaks down system into 7 main processes
- Shows data stores and their relationships
- Illustrates process interactions and data flow directions

### Level 2 (Detailed Processes)
- Provides detailed breakdown of critical processes
- Shows step-by-step flow within booking management
- Details task assignment and payment processing workflows
- Includes service provider task management processes

## Key Strengths

1. **Clear Separation of Concerns**: Well-structured MVC architecture
2. **Role-Based Access**: Proper authorization for different user types
3. **Comprehensive Booking System**: End-to-end booking and task management
4. **Payment Integration**: Secure payment processing with Khalti
5. **Notification System**: Automated email notifications for key events
6. **Scalable Architecture**: Laravel framework provides good scalability foundation

## Areas for Improvement

1. **API Development**: Consider RESTful API for mobile app integration
2. **Real-time Updates**: WebSocket integration for live notifications
3. **Advanced Reporting**: Enhanced analytics and reporting dashboard
4. **Multi-payment Gateway**: Support for additional payment methods
5. **File Management**: Better file storage and management system
6. **Caching**: Implement caching for better performance

## File Structure Analysis

The project follows Laravel's standard structure with well-organized:
- **Controllers**: Separated by user roles (Admin, User, ServiceProvider)
- **Models**: Clear Eloquent relationships
- **Routes**: Modular route organization by functionality
- **Middleware**: Custom role management
- **Migrations**: Comprehensive database schema

This analysis provides a solid foundation for understanding the GharSewa system's architecture, data flow, and business processes.
