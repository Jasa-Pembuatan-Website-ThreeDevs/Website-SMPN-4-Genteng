<?php

namespace App\Http\Controllers;

use App\Models\PpdbRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Unit\Inch;
use PhpOffice\PhpWord\Shared\Pt;
use PhpOffice\PhpWord\Shared\RGBColor;

class PpdbRegistrationController extends Controller
{
    public function index()
    {
        $registrations = PpdbRegistration::latest()->paginate(20);
        return view('admin.ppdb_registrations.index', compact('registrations'));
    }

    public function export()
    {
        $registrations = PpdbRegistration::all();
        $filename = 'ppdb_registrations_' . date('Ymd_His') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$filename"
        ];
        $callback = function() use ($registrations) {
            $file = fopen('php://output', 'w');
            fputcsv($file, [
                'Nama', 'NISN', 'Tempat Lahir', 'Tanggal Lahir', 'Jenis Kelamin', 'Asal Sekolah', 'Alamat', 'Nama Wali', 'WhatsApp', 'Foto', 'KK'
            ]);
            foreach ($registrations as $reg) {
                fputcsv($file, [
                    $reg->name,
                    $reg->nisn,
                    $reg->birth_place,
                    $reg->birth_date,
                    $reg->gender,
                    $reg->origin_school,
                    $reg->address,
                    $reg->parent_name,
                    $reg->whatsapp,
                    $reg->photo_path ? asset('storage/' . $reg->photo_path) : 'No Photo',
                    $reg->kk_path ? asset('storage/' . $reg->kk_path) : 'No KK'
                ]);
            }
            fclose($file);
        };
        return Response::stream($callback, 200, $headers);
    }

    public function exportWord()
    {
        $registrations = PpdbRegistration::all();
        
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        
        // Add title
        $section->addText('Data Pendaftaran PPDB', [
            'name' => 'Calibri',
            'size' => 18,
            'bold' => true,
            'color' => '0066cc'
        ]);
        
        $section->addText('SMPN 4 Genteng', [
            'name' => 'Calibri',
            'size' => 12,
            'italic' => true
        ]);
        
        $section->addText('Tanggal Export: ' . date('d F Y H:i'), [
            'name' => 'Calibri',
            'size' => 10,
            'color' => '666666'
        ]);
        
        $section->addTextBreak();
        
        // Create table with 11 columns (Photo + KK + 9 data fields)
        $table = $section->addTable([
            'borderSize' => 6,
            'borderColor' => 'cccccc',
        ]);
        
        // Add header row
        $headerCells = $table->addRow(\PhpOffice\PhpWord\Unit\Inch::fromString('0.5in'), ['exactHeight' => true]);
        
        $headerCells->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('0.8in'))->addText('Foto', ['bold' => true, 'color' => 'ffffff'], ['bgColor' => '0066cc']);
        $headerCells->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('0.8in'))->addText('KK', ['bold' => true, 'color' => 'ffffff'], ['bgColor' => '0066cc']);
        $headerCells->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('1in'))->addText('Nama', ['bold' => true, 'color' => 'ffffff'], ['bgColor' => '0066cc']);
        $headerCells->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('0.8in'))->addText('NISN', ['bold' => true, 'color' => 'ffffff'], ['bgColor' => '0066cc']);
        $headerCells->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('1in'))->addText('Tempat Lahir', ['bold' => true, 'color' => 'ffffff'], ['bgColor' => '0066cc']);
        $headerCells->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('0.9in'))->addText('Tanggal Lahir', ['bold' => true, 'color' => 'ffffff'], ['bgColor' => '0066cc']);
        $headerCells->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('0.7in'))->addText('Gender', ['bold' => true, 'color' => 'ffffff'], ['bgColor' => '0066cc']);
        $headerCells->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('1in'))->addText('Asal Sekolah', ['bold' => true, 'color' => 'ffffff'], ['bgColor' => '0066cc']);
        $headerCells->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('1in'))->addText('Alamat', ['bold' => true, 'color' => 'ffffff'], ['bgColor' => '0066cc']);
        $headerCells->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('0.9in'))->addText('Nama Wali', ['bold' => true, 'color' => 'ffffff'], ['bgColor' => '0066cc']);
        $headerCells->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('0.9in'))->addText('WhatsApp', ['bold' => true, 'color' => 'ffffff'], ['bgColor' => '0066cc']);
        
        // Add data rows
        foreach ($registrations as $reg) {
            $row = $table->addRow(\PhpOffice\PhpWord\Unit\Inch::fromString('1.2in'), ['exactHeight' => true]);
            
            // Photo cell
            $photoCell = $row->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('0.8in'));
            if ($reg->photo_path && Storage::disk('public')->exists($reg->photo_path)) {
                $photoPath = Storage::disk('public')->path($reg->photo_path);
                $photoCell->addImage($photoPath, [
                    'width' => \PhpOffice\PhpWord\Unit\Inch::fromString('0.7in'),
                    'height' => \PhpOffice\PhpWord\Unit\Inch::fromString('0.9in'),
                    'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER,
                ]);
            } else {
                $photoCell->addText('No Photo', ['italic' => true, 'color' => '999999']);
            }
            
            // KK cell
            $kkCell = $row->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('0.8in'));
            if ($reg->kk_path && Storage::disk('public')->exists($reg->kk_path)) {
                $kkCell->addText('✓', ['bold' => true, 'color' => '00aa00', 'size' => 14], ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            } else {
                $kkCell->addText('No KK', ['italic' => true, 'color' => '999999']);
            }
            
            // Data cells
            $row->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('1in'))->addText($reg->name);
            $row->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('0.8in'))->addText((string)$reg->nisn);
            $row->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('1in'))->addText($reg->birth_place);
            $row->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('0.9in'))->addText($reg->birth_date->format('d/m/Y'));
            $row->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('0.7in'))->addText($reg->gender === 'L' ? 'Laki-laki' : 'Perempuan');
            $row->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('1in'))->addText($reg->origin_school);
            $row->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('1in'))->addText($reg->address);
            $row->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('0.9in'))->addText($reg->parent_name);
            $row->addCell(\PhpOffice\PhpWord\Unit\Inch::fromString('0.9in'))->addText($reg->whatsapp);
        }
        
        // Save and return
        $filename = 'ppdb_registrations_' . date('Ymd_His') . '.docx';
        $filepath = storage_path('app/' . $filename);
        
        $phpWord->save($filepath);
        
        return response()->download($filepath)->deleteFileAfterSend(true);
    }
}
