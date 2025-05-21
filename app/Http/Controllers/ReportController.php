<?php


namespace App\Http\Controllers;


use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Question;
use App\Models\Registration;
use App\Models\Ticket;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Font;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.index');
    }

    public function showFilterForm1(Request $request)
    {
        $from = $request->input('from') ?? date("Y-m-d", strtotime("-30 days"));
        $to = $request->input('to') ?? date("Y-m-d", strtotime("+30 days"));
        $type = $request->input('type') ?? "all";

        $action = $request->input('action');
        $data = []; // Inisialisasi data

        if ($action == 'view') {
            // Ambil data dari database atau sumber lainnya berdasarkan filter
            // Contoh data dummy untuk ilustrasi

            $data = $this->getData1($from, $to, $type);
        }

        if ($action == 'export') {
            // Redirect ke route ekspor dengan parameter filter
            return redirect()->route('export1', $request->except('action'));
        }

        return view('report.filter1', compact('data'));
    }

    public function showFilterForm2(Request $request)
    {
        $from = $request->input('from') ?? date("Y-m-d", strtotime("-30 days"));
        $to = $request->input('to') ?? date("Y-m-d", strtotime("+30 days"));
        $type = $request->input('type') ?? "all";


        $action = $request->input('action');
        $data = []; // Inisialisasi data

        if ($action == 'view') {
            // Ambil data dari database atau sumber lainnya berdasarkan filter
            // Contoh data dummy untuk ilustrasi

            $data = $this->getData2($from, $to, $type);
        }

        if ($action == 'export') {
            // Redirect ke route ekspor dengan parameter filter
            return redirect()->route('export2', $request->except('action'));
        }

        return view('report.filter2', compact('data'));
    }

    public function showFilterForm3(Request $request)
    {
        $from = $request->input('from') ?? date("Y-m-d", strtotime("-30 days"));
        $to = $request->input('to') ?? date("Y-m-d", strtotime("+30 days"));
        $type = $request->input('type') ?? "all";


        $action = $request->input('action');
        $data = []; // Inisialisasi data

        if ($action == 'view') {
            // Ambil data dari database atau sumber lainnya berdasarkan filter
            // Contoh data dummy untuk ilustrasi

            $data = $this->getData3($from, $to, $type);
        }

        if ($action == 'export') {
            // Redirect ke route ekspor dengan parameter filter
            return redirect()->route('export3', $request->except('action'));
        }

        return view('report.filter3', compact('data'));
    }

    public function export1(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $type = $request->input('type');

        $data[0] = ['No', 'User', 'Staff', 'Kategori', 'Judul', 'Deskripsi', 'Status', 'Created At'];
        $data[] = $this->getData1($from, $to, $type);

        // kalau g ada data jangan tampilkan
        if (count($data[1]) < 1) {
            return redirect()->back()->with('errors', 'Data empty!');
        }

        // Buat Spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan judul "Data Instrumen" dengan font size 24 dan 1 baris spasi di bawahnya
        $sheet->setCellValue('A1', 'Data Ticket');
        $sheet->mergeCells('A1:H1');
        $sheet->getStyle('A1:H1')->getFont()->setBold(true)->setSize(24);
        $sheet->getStyle('A1:H1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1:H1')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A1:H1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('20B853'); // RGB (32, 184, 83)
        $sheet->getStyle('A1:H1')->getFont()->getColor()->setRGB('FFFFFF'); // White color for font

        // Menambahkan baris spasi di bawah judul
        $sheet->setCellValue('A2', '');
        $sheet->mergeCells('A2:H2');

        // Menulis header kolom dengan styling
        $sheet->fromArray($data[0], null, 'A3');
        $sheet->getStyle('A3:H3')->getFont()->setBold(true);
        $sheet->getStyle('A3:H3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A3:H3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');
        $sheet->getStyle('A3:H3')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Menulis data ke spreadsheet mulai dari baris ke-4
        foreach ($data as $key => $row) {
            if ($key > 0) {
                $sheet->fromArray($row, null, 'A' . ($key + 3));
            }
        }

        // Menyesuaikan ukuran kolom
        $sheet->getColumnDimension('A')->setWidth(10);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(25);
        $sheet->getColumnDimension('E')->setWidth(25);
        $sheet->getColumnDimension('F')->setWidth(25);
        $sheet->getColumnDimension('G')->setWidth(25);
        $sheet->getColumnDimension('H')->setWidth(25);

        // Menambahkan border pada setiap sel
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $sheet->getStyle('A1:H' . (count($data[1]) + 3))->applyFromArray($styleArray);

        // Menyimpan file Excel
        $date = date('Y-m-d');
        $time = date('H-i');
        $filename = "data-ticket-$date-$time.xlsx";
        $writer = new Xlsx($spreadsheet);

        // Mengunduh file
        $response = response()->stream(
            function () use ($writer) {
                $writer->save('php://output');
            },
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment;filename="' . $filename . '"',
                'Cache-Control' => 'max-age=0',
            ]
        );

        return $response;
    }

    public function export2(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $type = $request->input('type');

        $data[0] = ['No', 'User', 'Kategori', 'Judul', 'Status', 'Tujuan', 'Created At'];
        $data[] = $this->getData2($from, $to, $type);

        // kalau g ada data jangan tampilkan
        if (count($data[1]) < 1) {
            return redirect()->back()->with('errors', 'Data empty!');
        }

        // Buat Spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan judul "Data Instrumen" dengan font size 24 dan 1 baris spasi di bawahnya
        $sheet->setCellValue('A1', 'Data Pengumuman');
        $sheet->mergeCells('A1:G1');
        $sheet->getStyle('A1:G1')->getFont()->setBold(true)->setSize(24);
        $sheet->getStyle('A1:G1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1:G1')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A1:G1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('20B853'); // RGB (32, 184, 83)
        $sheet->getStyle('A1:G1')->getFont()->getColor()->setRGB('FFFFFF'); // White color for font

        // Menambahkan baris spasi di bawah judul
        $sheet->setCellValue('A2', '');
        $sheet->mergeCells('A2:G2');

        // Menulis header kolom dengan styling
        $sheet->fromArray($data[0], null, 'A3');
        $sheet->getStyle('A3:G3')->getFont()->setBold(true);
        $sheet->getStyle('A3:G3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A3:G3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');
        $sheet->getStyle('A3:G3')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Menulis data ke spreadsheet mulai dari baris ke-4
        foreach ($data as $key => $row) {
            if ($key > 0) {
                $sheet->fromArray($row, null, 'A' . ($key + 3));
            }
        }

        // Menyesuaikan ukuran kolom
        $sheet->getColumnDimension('A')->setWidth(10);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(25);
        $sheet->getColumnDimension('E')->setWidth(25);
        $sheet->getColumnDimension('F')->setWidth(25);
        $sheet->getColumnDimension('G')->setWidth(25);

        // Menambahkan border pada setiap sel
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $sheet->getStyle('A1:G' . (count($data[1]) + 3))->applyFromArray($styleArray);

        // Menyimpan file Excel
        $date = date('Y-m-d');
        $time = date('H-i');
        $filename = "data-pengumuman-$date-$time.xlsx";
        $writer = new Xlsx($spreadsheet);

        // Mengunduh file
        $response = response()->stream(
            function () use ($writer) {
                $writer->save('php://output');
            },
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment;filename="' . $filename . '"',
                'Cache-Control' => 'max-age=0',
            ]
        );

        return $response;
    }

    public function export3(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $type = $request->input('type');

        $data[0] = ['No', 'User', 'Kategori', 'Judul', 'Status', 'Tujuan', 'Created At'];
        $data[] = $this->getData3($from, $to, $type);

        // kalau g ada data jangan tampilkan
        if (count($data[1]) < 1) {
            return redirect()->back()->with('errors', 'Data empty!');
        }

        // Buat Spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan judul "Data Instrumen" dengan font size 24 dan 1 baris spasi di bawahnya
        $sheet->setCellValue('A1', 'Data Berita');
        $sheet->mergeCells('A1:G1');
        $sheet->getStyle('A1:G1')->getFont()->setBold(true)->setSize(24);
        $sheet->getStyle('A1:G1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1:G1')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A1:G1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('20B853'); // RGB (32, 184, 83)
        $sheet->getStyle('A1:G1')->getFont()->getColor()->setRGB('FFFFFF'); // White color for font

        // Menambahkan baris spasi di bawah judul
        $sheet->setCellValue('A2', '');
        $sheet->mergeCells('A2:G2');

        // Menulis header kolom dengan styling
        $sheet->fromArray($data[0], null, 'A3');
        $sheet->getStyle('A3:G3')->getFont()->setBold(true);
        $sheet->getStyle('A3:G3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A3:G3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');
        $sheet->getStyle('A3:G3')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Menulis data ke spreadsheet mulai dari baris ke-4
        foreach ($data as $key => $row) {
            if ($key > 0) {
                $sheet->fromArray($row, null, 'A' . ($key + 3));
            }
        }

        // Menyesuaikan ukuran kolom
        $sheet->getColumnDimension('A')->setWidth(10);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(25);
        $sheet->getColumnDimension('E')->setWidth(25);
        $sheet->getColumnDimension('F')->setWidth(25);
        $sheet->getColumnDimension('G')->setWidth(25);

        // Menambahkan border pada setiap sel
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $sheet->getStyle('A1:G' . (count($data[1]) + 3))->applyFromArray($styleArray);

        // Menyimpan file Excel
        $date = date('Y-m-d');
        $time = date('H-i');
        $filename = "data-berita-$date-$time.xlsx";
        $writer = new Xlsx($spreadsheet);

        // Mengunduh file
        $response = response()->stream(
            function () use ($writer) {
                $writer->save('php://output');
            },
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment;filename="' . $filename . '"',
                'Cache-Control' => 'max-age=0',
            ]
        );

        return $response;
    }


    /**
     * @param $from
     * @param $to
     * @param $type
     * @return array
     */
    public function getData1($from, $to, $type): array
    {
        $type = $type == 'all' ? '' : $type;

        $tickets = Ticket::whereDate('created_at', '>=', $from)
            ->whereDate('created_at', '<=', $to)
            ->where('status', 'like', "%$type%")
            ->get();
        $data = []; // Inisialisasi data

        // Ambil data dari database atau sumber lainnya berdasarkan filter
        // Contoh data dummy untuk ilustrasi

        foreach ($tickets as $keyTicket => $ticket) {
            $addData = null;

            $data[] = [$keyTicket + 1, $ticket->user->username, $ticket->staff->name, $ticket->kticket->nama, $ticket->judul, $ticket->deskripsi, $ticket->status, $ticket->created_at];
        }

        return $data;
    }

    /**
     * @param $from
     * @param $to
     * @param $type
     * @return array
     */
    public function getData2($from, $to, $type): array
    {
        $type = $type == 'all' ? '' : $type;

        $pengumumans = Pengumuman::whereDate('created_at', '>=', $from)
            ->whereDate('created_at', '<=', $to)
            ->where('status', 'like', "%$type%")
            ->get();
        $data = []; // Inisialisasi data

        // Ambil data dari database atau sumber lainnya berdasarkan filter
        // Contoh data dummy untuk ilustrasi

        foreach ($pengumumans as $keyPengumuman => $pengumuman) {
            $addData = null;

            $data[] = [$keyPengumuman + 1, $pengumuman->user->username, $pengumuman->kpengumuman->nama, $pengumuman->judul, $pengumuman->status, $pengumuman->tujuan, $pengumuman->created_at];
        }

        return $data;
    }

    /**
     * @param $from
     * @param $to
     * @param $type
     * @return array
     */
    public function getData3($from, $to, $type): array
    {
        $type = $type == 'all' ? '' : $type;

        $beritas = Berita::whereDate('created_at', '>=', $from)
            ->whereDate('created_at', '<=', $to)
            ->where('status', 'like', "%$type%")
            ->get();
        $data = []; // Inisialisasi data

        // Ambil data dari database atau sumber lainnya berdasarkan filter
        // Contoh data dummy untuk ilustrasi

        foreach ($beritas as $keyBerita => $berita) {
            $addData = null;

            $data[] = [$keyBerita + 1, $berita->user->username, $berita->kberita->nama, $berita->judul, $berita->status, $berita->tujuan, $berita->created_at];
        }

        return $data;
    }

    private function getScoreMin(mixed $type)
    {
        if ($type == 'penyembuhan_luka_cepat') {
            return 0;
        }

        if ($type == 'penyembuhan_luka_sedang') {
            return 8;
        }

        if ($type == 'penyembuhan_luka_lambat') {
            return 15;
        }

        return 0;

    }

    private function getScoreMax(mixed $type)
    {
        if ($type == 'penyembuhan_luka_cepat') {
            return 7;
        }

        if ($type == 'penyembuhan_luka_sedang') {
            return 14;
        }

        if ($type == 'penyembuhan_luka_lambat') {
            return 21;
        }

        return 100;
    }
}
