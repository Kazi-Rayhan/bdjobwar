<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Deletion Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .header {
            background-color: #dc3545;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background-color: white;
            padding: 30px;
            border-radius: 0 0 5px 5px;
        }
        .info-box {
            background-color: #f8f9fa;
            border-left: 4px solid #dc3545;
            padding: 15px;
            margin: 20px 0;
        }
        .info-item {
            margin: 10px 0;
        }
        .info-label {
            font-weight: bold;
            color: #555;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #666;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Account Deletion Request</h2>
        </div>
        <div class="content">
            <p>Hello,</p>
            
            <p>A user has requested to delete their account and remove all associated information from BDJobWar.</p>
            
            <div class="info-box">
                <div class="info-item">
                    <span class="info-label">Name:</span> {{ $name }}
                </div>
                <div class="info-item">
                    <span class="info-label">Email:</span> {{ $email }}
                </div>
                @if($phone)
                <div class="info-item">
                    <span class="info-label">Phone:</span> {{ $phone }}
                </div>
                @endif
                @if($userId)
                <div class="info-item">
                    <span class="info-label">User ID:</span> {{ $userId }}
                </div>
                @endif
                <div class="info-item">
                    <span class="info-label">Reason for Deletion:</span>
                    <p style="margin-top: 5px;">{{ $reason }}</p>
                </div>
            </div>
            
            <p><strong>Action Required:</strong> Please review this request and proceed with account deletion and data removal as per your data retention policy.</p>
            
            <p>This is an automated email from the BDJobWar platform.</p>
        </div>
        <div class="footer">
            <p>BDJobWar - Account Deletion Request System</p>
            <p>This email was sent automatically. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>
