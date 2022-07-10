<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
return [

    /*
     * The class to use to handle the export functionality
     */
    'exports' => \SIGA\Table\Exports\Export::class,

    /*
     * Which library you want to use for PDF generation
     * Supports dompdf, mpdf
     * You must install the appropriate third party package for each
     * See: https://docs.laravel-excel.com/3.1/exports/export-formats.html
     * And: https://phpspreadsheet.readthedocs.io/en/latest/topics/reading-and-writing-to-file/#pdf
     */
    'pdf_library' => 'dompdf',
   //'pagination'=>'tailwind',
    'pagination'=>'bootstrap',

    /*
     * The frontend styling framework to use
     * Options: bootstrap-4
     */
    //'theme' => 'tailwind',
    'theme' => 'bootstrap',
    //'theme' => 'core-ui',
    'attributes'=>[
        'td'=>[
            'edit'=>[
                'width'=>150
            ]
        ]
    ]
];
