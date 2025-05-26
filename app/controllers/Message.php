<?php

session_start();

class Message extends Controller
{
    private $datas = [
        [
            'id' => 1,
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'message' => 'Saya tertarik dengan layanan Anda dan ingin tahu lebih banyak tentang paket yang ditawarkan.',
            'date' => '2023-05-15 14:30:22',
            'status' => 'unread',
            'priority' => 'medium'
        ],
        [
            'id' => 2,
            'name' => 'Siti Rahayu',
            'email' => 'siti@example.com',
            'message' => 'Apakah ada diskon untuk pembelian dalam jumlah besar? Kami berencana untuk memesan sekitar 50 unit.',
            'date' => '2023-05-14 09:15:45',
            'status' => 'unread',
            'priority' => 'high'
        ],
        [
            'id' => 3,
            'name' => 'Ahmad Hidayat',
            'email' => 'ahmad@example.com',
            'message' => 'Saya mengalami masalah dengan produk yang saya beli minggu lalu. Bisakah seseorang menghubungi saya untuk membantu menyelesaikan masalah ini?',
            'date' => '2023-05-13 16:45:10',
            'status' => 'unread',
            'priority' => 'high'
        ],
        [
            'id' => 4,
            'name' => 'Dewi Lestari',
            'email' => 'dewi@example.com',
            'message' => 'Terima kasih atas pelayanan yang luar biasa. Saya sangat puas dengan produk Anda.',
            'date' => '2023-05-12 11:20:33',
            'status' => 'read',
            'priority' => 'low'
        ],
        [
            'id' => 5,
            'name' => 'Rudi Hartono',
            'email' => 'rudi@example.com',
            'message' => 'Saya ingin mengetahui apakah ada lowongan pekerjaan di perusahaan Anda saat ini.',
            'date' => '2023-05-11 13:55:18',
            'status' => 'unread',
            'priority' => 'medium'
        ],
        [
            'id' => 6,
            'name' => 'Rudi Hartono',
            'email' => 'rudi@example.com',
            'message' => 'Saya ingin mengetahui apakah ada lowongan pekerjaan di perusahaan Anda saat ini.',
            'date' => '2023-05-11 13:55:18',
            'status' => 'unread',
            'priority' => 'medium'
        ],
        [
            'id' => 7,
            'name' => 'Rudi Hartono',
            'email' => 'rudi@example.com',
            'message' => 'Saya ingin mengetahui apakah ada lowongan pekerjaan di perusahaan Anda saat ini.',
            'date' => '2023-05-11 13:55:18',
            'status' => 'unread',
            'priority' => 'medium'
        ],
    ];

    public function index()
    {
        $data = $this->model('Pesan')->getAllMessages();

        // Check if user is logged in as admin, if not redirect to login
        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'ADMIN') {
            header('Location: ' . BASEURL . '/Login');
            exit;
        }

        // Get filter values from GET parameters
        $statusFilter = isset($_GET['status']) ? $_GET['status'] : '';
        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

        // Filter messages
        $filteredMessages = array_filter($data, function($message) use ($statusFilter, $priorityFilter, $searchQuery) {
            $matchesStatus = empty($statusFilter) || $message['status'] === $statusFilter;
            $matchesSearch = empty($searchQuery) || 
                            stripos($message['name'], $searchQuery) !== false || 
                            stripos($message['email'], $searchQuery) !== false || 
                            stripos($message['message'], $searchQuery) !== false;
            
            return $matchesStatus && $matchesSearch;
        });

        // Reset array keys after filtering
        $filteredMessages = array_values($filteredMessages);

        // Calculate message statistics
        $stats = [
            'total' => count($data),
            'unread' => count(array_filter($data, function($m) { return $m['status'] === 'Unread'; })),
            'read' => count(array_filter($data, function($m) { return $m['status'] === 'Read'; }))
        ];

        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('message/index', [
            'messages' => $filteredMessages,
            'stats' => $stats,
            'searchQuery' => $searchQuery
        ]);
        $this->view('template/Footer');
    }

    // Update message status
    public function updateStatus()
    {
        $this->model('Pesan')->updatePesanById($_POST['id']);
    }
    
    // Helper methods that should be accessible in the view
    public function getStatusBadgeClass($status) 
    {
        switch ($status) {
            case 'Unread':
                return 'bg-danger';
            case 'Read':
                return 'bg-warning';
            
        }
    }

    public function formatDate($date) 
    {
        $timestamp = strtotime($date);
        return date('d M Y, H:i', $timestamp);
    }
    
    // Helper methods for translating status and priority to Indonesian
    public function translateStatus($status) 
    {
        switch($status) {
            case 'Unread': return 'Belum Dibaca';
            case 'Read': return 'Sudah Dibaca';
            default: return ucfirst($status);
        }
    }
}