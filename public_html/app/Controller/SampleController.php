<? php 
class SampleController extends AppController { 
	public function index() { 
		$this->autoRender = false;
		$this->redirect("./ other/"); 
		echo "<html><head></head><body>"; 
		echo "<h1> サンプ </h1>";
		echo "<p> これ が サンプル の ページ です。 </p>"; echo "</body></html>";
		}
}
