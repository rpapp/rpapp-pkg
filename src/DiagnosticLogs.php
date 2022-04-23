<?php

namespace RPAPP;

use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
use DateTime;

use RPAPP\UniqueIdentifier;

class DiagnosticLogs
{
    /**
     * Constructor.
     */
    public function __construct() {}
    /**
     * Generate diagnostic logs.
     * @param string|null $projectCode
     * @param string|null $fullname
     * @param string|null $username
     * @param string|null $role
     * @param string|null $position
     * @param string|null $department
     * @param string|null $hostname
     * @param string|null $ipAddress
     * @param string|null $os
     * @param string|null $code
     * @param string|null $exception
     * @param string|null $message
     * @param string|null $logMessage
     * @param string|null $file
     * @param string|null $line
     * @param string|null $trace
     */
    public function generate(string $projectCode = null, string $fullname = null, string $username = null, string $role = null, string $position = null, string $department = null, 
        string $hostname = null, string $ipAddress = null, string $os = null, 
        string $code = null, string $exception = null, string $message = null, string $logMessage = null, string $file = null, string $line = null, string $trace = null, 
        bool $upload = true)
    {
        $result = null;

        $uniqueIdentifier = new UniqueIdentifier();
        $uid = $uniqueIdentifier->generate(UniqueIdentifier::RANDOM_BYTES, 8);

        $currentDate = new DateTime();
        $currentTime = new DateTime();
        $date = $currentDate->format('Ymd');
        $time = $currentTime->format('His');

        // Generate filename.
        $filename = $date.'_'.$time.'_'.$username.'_diagnostic-logs.txt';

        $xw = xmlwriter_open_memory();
        xmlwriter_set_indent($xw, 4);
        $res = xmlwriter_set_indent_string($xw, '    ');

        xmlwriter_start_document($xw, '1.0', 'UTF-8'); // Start

            xmlwriter_start_element($xw, 'diagnostic-logs');
                xmlwriter_start_attribute($xw, 'project-code');
                    xmlwriter_text($xw, $projectCode);
                xmlwriter_end_attribute($xw);

                xmlwriter_start_attribute($xw, 'identifier');
                    xmlwriter_text($xw, $uid);
                xmlwriter_end_attribute($xw);

                xmlwriter_start_attribute($xw, 'upload');
                    xmlwriter_text($xw, $upload);
                xmlwriter_end_attribute($xw);

                xmlwriter_start_element($xw, 'filename');
                    xmlwriter_text($xw, $filename);
                xmlwriter_end_element($xw);

                xmlwriter_start_element($xw, 'timestamp');
                    xmlwriter_text($xw, Carbon::now()->toDateTimeString());
                xmlwriter_end_element($xw);

                xmlwriter_start_element($xw, 'user-info');
                    xmlwriter_start_element($xw, 'fullname');
                        xmlwriter_text($xw, $fullname);
                    xmlwriter_end_element($xw);

                    xmlwriter_start_element($xw, 'username');
                        xmlwriter_text($xw, $username);
                    xmlwriter_end_element($xw);

                    xmlwriter_start_element($xw, 'role');
                        xmlwriter_text($xw, $role);
                    xmlwriter_end_element($xw);

                    xmlwriter_start_element($xw, 'position');
                        xmlwriter_text($xw, $position);
                    xmlwriter_end_element($xw);

                    xmlwriter_start_element($xw, 'department');
                        xmlwriter_text($xw, $department);
                    xmlwriter_end_element($xw);
                xmlwriter_end_element($xw);

                xmlwriter_start_element($xw, 'hostname');
                    xmlwriter_text($xw, $hostname);
                xmlwriter_end_element($xw);

                xmlwriter_start_element($xw, 'ip-address');
                    xmlwriter_text($xw, $ipAddress);
                xmlwriter_end_element($xw);

                xmlwriter_start_element($xw, 'os');
                    xmlwriter_text($xw, $os);
                xmlwriter_end_element($xw);

                xmlwriter_start_element($xw, 'details');
                    xmlwriter_start_element($xw, 'code');
                        xmlwriter_text($xw, $code);
                    xmlwriter_end_element($xw);

                    xmlwriter_start_element($xw, 'exception');
                        xmlwriter_text($xw, $exception);
                    xmlwriter_end_element($xw);

                    xmlwriter_start_element($xw, 'message');
                        xmlwriter_text($xw, $message);
                    xmlwriter_end_element($xw);

                    xmlwriter_start_element($xw, 'log-message');
                        xmlwriter_text($xw, $logMessage);
                    xmlwriter_end_element($xw);

                    xmlwriter_start_element($xw, 'file');
                        xmlwriter_text($xw, $file);
                    xmlwriter_end_element($xw);

                    xmlwriter_start_element($xw, 'line');
                        xmlwriter_text($xw, $line);
                    xmlwriter_end_element($xw);

                    xmlwriter_start_element($xw, 'trace');
                        xmlwriter_text($xw, $trace);
                    xmlwriter_end_element($xw);
        
                xmlwriter_end_element($xw);

            xmlwriter_end_element($xw);
        
        xmlwriter_end_document($xw); // End

        Storage::disk('local')->put('diagnostic_logs/'.$filename, xmlwriter_output_memory($xw));

        $result = $filename;

        return $result;
    }
}