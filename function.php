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
	public function cari()
	{
		$cariberdasarkan=$this->input->post('select_cari');
			$yangdicari=$this->input->post('tcari');
			$rows=$this->AnggotaModel->cari($cariberdasarkan,$yangdicari);
		$title		= 'Data Anggota';
		$main_view	= 'anggota/tampil';
		$pagination	= $this->page('anggota/index');
		$this->load->view('page',compact('title','main_view','rows','pagination'));	
	}
	public function addData()
	{
		$title='Data Anggota/Data Baru';
		$main_view='anggota/addForm';
		$ida = $this->AnggotaModel->autoid();
		$this->_set_rules();
	if ($this->form_validation->run()==TRUE) {
	$data=[
			'id_anggota'=>$this->input->post('tId'),			
			'nm_anggota'=>$this->input->post('tNama'),
			'alamat'=>$this->input->post('tAlamat'),			
			'ttl_anggota'=>$this->input->post('tTTL'),
			'status_anggota'=>$this->input->post('tStatus')
	];
	//print_r($data)
	$this->AnggotaModel->tambahdata($data);
	$this->session->set_flashdata('pesan','Data Telah Di Tambah...');
	redirect('anggota','refresh');
	}else{
		$this->load->view('page',compact('main_view','title','ida'));
	}
	}





