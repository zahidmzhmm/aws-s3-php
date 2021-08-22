<?php


namespace app\aws;

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class AwsS3
{
    public function uploadToS3($fileName, $fileTmp, $filePath)
    {
        try {
            $s3 = S3Client::factory(
                array(
                    'credentials' => array(
                        'key' => AWS_IAM_KEY,
                        'secret' => AWS_IAM_SECRET
                    ),
                    'version' => 'latest',
                    'region' => AWS_REGION
                )
            );
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
        try {
            $s3->putObject(
                array(
                    'Bucket' => AWS_Bucket_Name,
                    'Key' => $filePath . '/' . $fileName,
                    'SourceFile' => $fileTmp,
                    'StorageClass' => 'REDUCED_REDUNDANCY'
                )
            );
        } catch (S3Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
        return [
            'success' => true, 'message' => 'Success',
            'file' => [
                'locate' => 'https://s3.' . AWS_REGION . '.amazonaws.com/' . AWS_Bucket_Name,
                'flname' => $fileName,
                'source' => '/' . $filePath . '/' . $fileName,
                'full_source' => 'https://s3.' . AWS_REGION . '.amazonaws.com/' . AWS_Bucket_Name . '/' . $filePath . '/' . $fileName
            ]
        ];
    }

    public function readToS3($path, $fileName)
    {
        try {
            $s3 = S3Client::factory(
                array(
                    'credentials' => array(
                        'key' => AWS_IAM_KEY,
                        'secret' => AWS_IAM_SECRET
                    ),
                    'version' => 'latest',
                    'region' => AWS_REGION
                )
            );
            $result = $s3->getObject(array(
                'Bucket' => AWS_Bucket_Name,
                'Key' => $path . '/' . $fileName
            ));
            header("Content-Type: {$result['ContentType']}");
            header('Content-Disposition: filename="' . $path . '/' . $fileName . '"');
            return $result['Body'];

        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}