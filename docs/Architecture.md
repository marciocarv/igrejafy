# IgrejaFy SaaS Architecture

Version: 1.0

Status: Planning

---

# Overview

IgrejaFy is evolving from a single-tenant church management system into a multi-tenant SaaS platform capable of serving thousands of churches from a single codebase while ensuring complete data isolation, security, scalability, and high availability.

This document defines the architecture that will guide the implementation.

---

# Architecture Principles

The architecture of IgrejaFy is based on the following principles:

- One codebase
- Multiple tenants
- Complete data isolation
- Horizontal scalability
- Security by design
- Cloud-first
- Cost efficiency
- Zero-downtime deployments

---

# High-Level Architecture

                        Internet
                            │
                     app.igrejafy.com
                            │
                    Load Balancer (Future)
                            │
                Laravel Application Cluster
                            │
            ┌───────────────┴────────────────┐
            │                                │
        Tenant Resolver                  Authentication
            │                                │
            └───────────────┬────────────────┘
                            │
                     Application Services
                            │
            ┌───────────────┴────────────────┐
            │                                │
      Shared Database                  File Storage
            │                                │
         MySQL                        S3 / Local Storage

---

# Multi-Tenancy Strategy

## Decision

Single Database

Shared Schema

Tenant Isolation by tenant_id

Example:

Church A

tenant_id = 1

Church B

tenant_id = 2

Church C

tenant_id = 3

Every table belonging to a church will contain:

tenant_id

Example

People

id

tenant_id

name

birth_date

email

...

Visits

id

tenant_id

person_id

visit_date

...

Baptisms

id

tenant_id

person_id

...

Advantages

- Lower hosting cost
- Easier backups
- Easier migrations
- Easier deployment
- Better scalability for the first years

---

# Tenant Resolution

Every request must identify the current tenant.

Initially:

Logged-in user

↓

user

↓

tenant

↓

tenant_id

The application automatically scopes every query.

Future support:

church.app.igrejafy.com

or

church.com

using custom domains.

---

# Authentication

Laravel Authentication

Email

Password

Remember Me

Password Reset

Later

Google Login

Microsoft Login

Apple Login

---

# User Hierarchy

Platform Owner

↓

Platform Administrator

↓

Tenant (Church)

↓

Church Administrator

↓

Pastor

↓

Secretary

↓

Leader

↓

Volunteer

↓

Member (future portal)

---

# Roles

Platform

- Super Admin

Church

- Administrator
- Pastor
- Secretary
- Treasurer
- Ministry Leader
- Teacher
- Volunteer

---

# Permissions

Permission-based Authorization

Example

People

people.view

people.create

people.edit

people.delete

Visits

visits.view

visits.create

...

Reports

reports.view

reports.export

Certificates

certificates.generate

Future implementation:

spatie/laravel-permission

---

# Tenant Database Structure

Shared Tables

users

tenants

plans

subscriptions

payments

audit_logs

notifications

Tenant Tables

people

visits

baptisms

ministries

departments

events

attendance

offerings

expenses

certificates

reports

Every tenant table includes:

tenant_id

---

# Tenant Model

Tenant

id

name

slug

email

phone

logo

timezone

language

plan_id

subscription_status

created_at

updated_at

---

# User Model

User

id

tenant_id

name

email

password

role

is_active

---

# Subscription Plans

Free

- 50 people
- Basic reports

Starter

- Unlimited people

Growth

- Advanced reports
- Ministries
- Attendance

Premium

- Finance
- API
- AI
- WhatsApp

Enterprise

Unlimited

Priority Support

Custom Domain

API

White Label (future)

---

# Billing

Stripe

Primary Gateway

PIX

Brazilian gateway

Future

Mercado Pago

PagSeguro

Asaas

Pagar.me

---

# File Storage

Current

Laravel Storage

Future

Amazon S3

Folder structure

tenant-1/

people/

certificates/

documents/

logos/

tenant-2/

...

No tenant accesses another tenant's files.

---

# Images

Profile Photos

Church Logos

Certificates

Documents

Exports

All isolated.

---

# Domains

Main

https://app.igrejafy.com

Tenant

https://church.app.igrejafy.com

Future

https://mychurch.com

Custom domains

---

# Onboarding

New Church

↓

Create Account

↓

Email Verification

↓

Create Church

↓

Select Plan

↓

Trial

↓

Complete Wizard

↓

Ready

Wizard

Step 1

Church Information

Step 2

Administrator

Step 3

Logo

Step 4

Import Members

Step 5

Finish

---

# Invitations

Administrator

↓

Invite User

↓

Email

↓

Accept Invitation

↓

Create Password

↓

Done

---

# Audit Logs

Every important action is logged.

Example

Created Person

Deleted Visit

Generated Certificate

Changed Role

Changed Subscription

Exported Report

Fields

user

tenant

ip

browser

action

created_at

---

# Backups

Database

Daily

Retention

30 days

Files

Weekly

Retention

90 days

Future

Cross-region backup

---

# Disaster Recovery

Automatic backups

Encrypted storage

Point-in-time recovery

Restore per tenant

Restore entire system

---

# Monitoring

Laravel Pulse

Laravel Horizon

Sentry

UptimeRobot

Cloud Monitoring

---

# Deployment

Current

Windows

Apache

Laravel

Future

Ubuntu

Nginx

PHP-FPM

Redis

Queue Workers

Scheduler

Docker

GitHub Actions

---

# Cache

Redis

Configuration

Sessions

Queues

Rate Limiting

Application Cache

---

# Queues

Emails

Certificate Generation

Exports

Notifications

WhatsApp

Imports

Future AI jobs

---

# Security

HTTPS

Encrypted Passwords

CSRF

XSS Protection

SQL Injection Protection

Rate Limiting

2FA (future)

Password Policy

Audit Logs

Encrypted Backups

---

# Scalability Plan

Phase 1

10 Churches

Single VPS

Phase 2

100 Churches

Bigger VPS

Redis

S3

Phase 3

1,000 Churches

Load Balancer

Multiple App Servers

Managed Database

Phase 4

10,000 Churches

Kubernetes

CDN

Microservices (if necessary)

Database Replicas

---

# Future Integrations

WhatsApp

Google Calendar

Google Drive

Microsoft 365

Zoom

PIX

Open Banking

Receita Federal

AI

---

# Artificial Intelligence

Church Assistant

Examples

Show inactive members

Generate visitor report

Who returned this month?

Create birthday message

Summarize church growth

Generate meeting minutes

Predict attendance

---

# API

REST API

Future GraphQL

OAuth2

Personal Tokens

Webhooks

---

# Roadmap

Phase 1

Current MVP

✔

Phase 2

Multi-tenancy

Phase 3

Subscriptions

Phase 4

Public Website

Phase 5

First 100 Churches

Phase 6

Mobile App

Phase 7

AI Assistant

Phase 8

International Expansion

---

# Success Metrics

99.9% uptime

<200ms average response time

Zero tenant data leaks

Daily automated backups

Horizontal scalability

Support 10,000+ churches

---

# Final Vision

IgrejaFy is more than a church management system.

It is a cloud platform that empowers churches to organize, grow, and care for people through simple, secure, and accessible technology.

Every architectural decision should reinforce this vision.
