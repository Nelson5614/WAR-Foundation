<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Student File: {{ $studentfile->name }} {{ $studentfile->surname }}</title>
    <style>
        @page {
            margin: 1.5cm 1cm;
        }
        body {
            font-family: 'DejaVu Sans', 'Helvetica', Arial, sans-serif;
            font-size: 12px;
            line-height: 1.5;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 21cm;
            margin: 0 auto;
            padding: 0;
        }
        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5cm;
            padding-bottom: 0.5cm;
            border-bottom: 2px solid #1a365d;
        }
        .logo-section {
            display: flex;
            align-items: center;
        }
        .logo {
            max-width: 150px;
            margin-right: 1rem;
        }
        .document-title {
            margin: 0;
            color: #1a365d;
            font-size: 18px;
            font-weight: 700;
        }
        .document-meta {
            text-align: right;
        }
        .document-id {
            background-color: #1a365d;
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 4px;
            font-weight: 600;
            font-size: 14px;
            display: inline-block;
        }
        .document-date {
            color: #666;
            font-size: 11px;
            margin-top: 0.3rem;
        }
        
        /* Student Info Section */
        .section-title {
            background-color: #f7fafc;
            color: #2d3748;
            padding: 0.5rem 1rem;
            font-size: 14px;
            font-weight: 600;
            margin: 1.5rem 0 1rem 0;
            border-left: 4px solid #4299e1;
            text-transform: uppercase;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .info-item {
            margin-bottom: 0.5rem;
            page-break-inside: avoid;
        }
        
        .info-label {
            font-size: 10px;
            text-transform: uppercase;
            color: #718096;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 0.2rem;
        }
        
        .info-value {
            font-size: 12px;
            color: #2d3748;
            font-weight: 500;
            padding: 0.4rem 0.6rem;
            background-color: #f8fafc;
            border-radius: 4px;
            border-left: 3px solid #4299e1;
        }
        
        /* Notes Section */
        .notes-section {
            margin-top: 1.5rem;
        }
        
        .notes-content {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            padding: 1rem;
            min-height: 120px;
            font-size: 12px;
            line-height: 1.6;
            white-space: pre-line;
        }
        
        /* Footer */
        .footer {
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid #e2e8f0;
            font-size: 9px;
            color: #718096;
            text-align: center;
        }
        
        /* Responsive adjustments */
        @media print {
            body {
                font-size: 11px;
            }
            .container {
                padding: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo-section">
                <!-- Replace with your logo -->
                <div class="logo">
                    <h1 class="document-title">Student File</h1>
                </div>
            </div>
            <div class="document-meta">
                <div class="document-id">ID: #{{ str_pad($studentfile->id, 4, '0', STR_PAD_LEFT) }}</div>
                <div class="document-date">Generated: {{ now()->format('M d, Y h:i A') }}</div>
            </div>
        </div>
        
        <!-- Student Information -->
        <div class="section-title">Student Information</div>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Full Name</div>
                <div class="info-value">{{ $studentfile->name }} {{ $studentfile->surname }}</div>
            </div>
            
            <div class="info-item">
                <div class="info-label">Email Address</div>
                <div class="info-value">{{ $studentfile->email }}</div>
            </div>
            
            <div class="info-item">
                <div class="info-label">Phone Number</div>
                <div class="info-value">{{ $studentfile->phone ?? 'Not provided' }}</div>
            </div>
            
            <div class="info-item">
                <div class="info-label">Student ID</div>
                <div class="info-value">#{{ str_pad($studentfile->id, 4, '0', STR_PAD_LEFT) }}</div>
            </div>
            
            @if($studentfile->address)
            <div class="info-item" style="grid-column: span 2;">
                <div class="info-label">Address</div>
                <div class="info-value">{{ $studentfile->address }}</div>
            </div>
            @endif
        </div>
        
        <!-- Session Notes -->
        @if($studentfile->description)
        <div class="section-title">Session Notes</div>
        <div class="notes-section">
            <div class="notes-content">
                {{ $studentfile->description }}
            </div>
        </div>
        @endif
        
        <!-- Additional Information -->
        <div class="section-title">Additional Information</div>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Date Created</div>
                <div class="info-value">{{ $studentfile->created_at->format('M d, Y') }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Last Updated</div>
                <div class="info-value">{{ $studentfile->updated_at->format('M d, Y') }}</div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p>This is a confidential document. Unauthorized access is prohibited. &copy; {{ date('Y') }} WAR Foundation. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
