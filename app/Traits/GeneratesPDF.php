<?php

namespace App\Traits;

use Barryvdh\DomPDF\Facade\Pdf;

trait GeneratesPDF
{
    /**
     * Generate PDF from blade view
     *
     * @param string $view The blade view name
     * @param array $data The data to pass to the view
     * @param string $fileName The filename for the PDF
     * @return \Illuminate\Http\Response
     */
    public function generatePDF(string $view, array $data, string $fileName)
    {
        // Sanitize data to ensure valid UTF-8
        $data = $this->sanitizeForPDF($data);

        $pdf = Pdf::loadView($view, $data);
        $pdf->setOption('encoding', 'UTF-8');
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, $fileName);
    }

    /**
     * Sanitize data to ensure valid UTF-8
     *
     * @param mixed $data
     * @return mixed
     */
    protected function sanitizeForPDF($data)
    {
        if (is_string($data)) {
            return mb_convert_encoding($data, 'UTF-8', 'UTF-8');
        }
        
        if (is_array($data)) {
            return array_map(function($item) {
                return $this->sanitizeForPDF($item);
            }, $data);
        }
        
        if ($data instanceof \Illuminate\Support\Collection) {
            return $data->map(function($item) {
                return $this->sanitizeForPDF($item);
            });
        }
        
        return $data;
    }

    /**
     * Get formatted date for PDF header
     *
     * @param string|null $date The date to format
     * @param string $format The format to use
     * @return string
     */
    public function formatDateForPDF(?string $date = null, string $format = 'd F Y'): string
    {
        if (!$date) {
            $date = now();
        } else {
            $date = \Carbon\Carbon::parse($date);
        }

        return $date->locale('id')->isoFormat('D MMMM Y');
    }
}
