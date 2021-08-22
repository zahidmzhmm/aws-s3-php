<b>ARN:</b> <br>
arn:aws:iam::898714848670:user/lectureverb-app
<b>Bucket Name:</b> <br>
<small>app.lectureverb</small> <br>
<b>IAM KEY:</b> <br>
<small>AKIA5CP4UJWPCYCA6EUW</small> <br>
<b>IAM SECRET:</b> <br>
<small>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</small><br>
<b>Bucket Policy</b>
<pre>
{
    "Version": "2012-10-17",
    "Id": "Policy1488494182833",
    "Statement": [
        {
            "Sid": "Stmt1488493308547",
            "Effect": "Allow",
            "Principal": {
                "AWS": "arn:aws:iam::898714848670:user/lectureverb-app"
            },
            "Action": [
                "s3:ListBucket",
                "s3:ListBucketVersions",
                "s3:GetBucketLocation",
                "s3:Get*",
                "s3:Put*"
            ],
            "Resource": "arn:aws:s3:::app.lectureverb"
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
