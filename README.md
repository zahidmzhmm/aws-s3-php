<b>ARN:</b> <br>
arn:aws:iam::***:user/test-app
<b>Bucket Name:</b> <br>
<small>app.name</small> <br>
<b>IAM KEY:</b> <br>
<small>***</small> <br>
<b>IAM SECRET:</b> <br>
<small>***</small><br>
<b>Bucket Policy</b>
<pre>
{
    "Version": "2012-10-17",
    "Id": "Policy123456789",
    "Statement": [
        {
            "Sid": "Stmt123456789",
            "Effect": "Allow",
            "Principal": {
                "AWS": "arn:aws:iam::***:user/test-app"
            },
            "Action": [
                "s3:ListBucket",
                "s3:ListBucketVersions",
                "s3:GetBucketLocation",
                "s3:Get*",
                "s3:Put*"
            ],
            "Resource": "arn:aws:s3:::app.name"
        }
    ]
}
</pre>
<b>New inline policy:</b>
<pre>
{
    "Version": "2012-10-17",
    "Statement": [
        {
            "Effect": "Allow",
            "Action": [
                "s3:ListAllMyBuckets",
                "s3:PutObject",
                "s3:GetObject"
            ],
            "Resource": [
                "arn:aws:s3:::*"
            ]
        }
    ]
}

</pre>
