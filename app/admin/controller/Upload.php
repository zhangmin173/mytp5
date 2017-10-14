<?php
namespace app\admin\controller;
/**
* 
*/
class Upload extends Home
{
	protected $db_file;
	protected $size;
	protected $ext;
	protected $basePath;
	protected $folder;

	protected function before()
	{
		$this->db_file = model('file');
		$this->size = 5*1024*1000;
		$this->ext = 'jpg,png';
		$this->folder = 'upload';
		$this->basePath = ROOT_PATH . 'public' . DS . $this->folder;
	}

	public function image()
	{
	    $file = request()->file('filedata');
	    $info = $file->validate(['size'=>$this->size,'ext'=>$this->ext])->move($this->basePath);

	    if($info){
	        // 成功上传后
	        $d['uid'] = $this->getUserInfo()['id'];
	        $d['path'] = $this->folder.'/'.$info->getPathInfo()->getFilename().'/'.$info->getFilename();
	        $d['name'] = $info->getFilename();
	        $d['type'] = $info->getExtension();
	        $d['size'] = $info->getSize();
	        
	        return json($this->db_file->create($d));
	    }else{
	        // 上传失败
	        return $file->getError();
	    }
	}

	public function test()
	{
		
	}
}