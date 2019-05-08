public function index($offset=0,$order_column='id_anggota',$order_type='asc'){
		if(empty($offset)) $offset=0;
		if(empty($order_column)) $order_column='id_anggota';
		if(empty($order_type)) $order_type='asc';
		//load data
		$rows= $this->AnggotaModel->semua($this->limit,$offset,$order_column,$order_type);
		$title		= 'Daftar Anggota Perpustakaan';
		$main_view	= 'anggota/tampil';
		$pagination = $this->page('anggota/index/');
		$this->load->view('page',compact('title','main_view','rows','pagination'));
	}
