@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="info-box bg-primary">
                <div class="info-box-icon">
                    <i class="fas fa-users fa-3x"></i>
                </div>
                <div class="info-box-content">
                    <span class="info-box-text">Total Employees</span>
                    <span class="info-box-number text-white display-4">{{ $totalEmployees }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box bg-warning">
                <div class="info-box-icon">
                    <i class="fas fa-clock fa-3x"></i>
                </div>
                <div class="info-box-content">
                    <span class="info-box-text">Pending Leave Requests</span>
                    <span class="info-box-number text-white display-4">{{ $pendingLeaveRequests }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box bg-success">
                <div class="info-box-icon">
                    <i class="fas fa-building fa-3x"></i>
                </div>
                <div class="info-box-content">
                    <span class="info-box-text">Total Departments</span>
                    <span class="info-box-number text-white display-4">{{ $totalDepartments }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box bg-danger">
                <div class="info-box-icon">
                    <i class="fas fa-briefcase fa-3x"></i>
                </div>
                <div class="info-box-content">
                    <span class="info-box-text">Total Designations</span>
                    <span class="info-box-number text-white display-4">{{ $totalDesignations }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Employee Status</h3>
                </div>
                <div class="card-body">
                    <canvas id="employeeStatusChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Leave Request Status</h3>
                </div>
                <div class="card-body">
                    <canvas id="leaveRequestStatusChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Employee status chart
            var employeeStatusChart = document.getElementById('employeeStatusChart').getContext('2d');
            var employeeStatusData = {
                labels: ['Active', 'Inactive'],
                datasets: [{
                    label: 'Employee Status',
                    data: [{{ $activeEmployees }}, {{ $inactiveEmployees }}],
                    backgroundColor: ['#28a745', '#dc3545']
                }]
            };
            var employeeStatusChartInstance = new Chart(employeeStatusChart, {
                type: 'pie',
                data: employeeStatusData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        }
                    }
                }
            });

            // Leave request status chart
            var leaveRequestStatusChart = document.getElementById('leaveRequestStatusChart').getContext('2d');
            var leaveRequestStatusData = {
                labels: ['Pending', 'Approved', 'Rejected'],
                datasets: [{
                    label: 'Leave Request Status',
                    data: [{{ $pendingLeaveRequests }}, {{ $approvedLeaveRequests }}, {{ $rejectedLeaveRequests }}],
                    backgroundColor: ['#ffc107', '#28a745', '#dc3545']
                }]
            };
            var leaveRequestStatusChartInstance = new Chart(leaveRequestStatusChart, {
                type: 'bar',
                data: leaveRequestStatusData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        title: {
                            display: true,
                            text: 'Leave Request Status'
                        }
                    },
                    scales: {
                        x: {
                            stacked: true // Adjusted to make the bar chart wider
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endpush