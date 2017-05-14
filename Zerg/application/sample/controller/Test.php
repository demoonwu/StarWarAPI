<?php 
	namespace app\sample\controller;
	use think\Request;

	/**
	* 作者：吴咏蔚
	*/
	class Test
	{
		public function hello()
		{
			return "hello 吴咏蔚";
		}
		public function getvar(Request $request){
			//var_dump($_GET);
			//return "测试通过";
			// 使用request方法
			// $all=Request::instance()->param();
			// var_dump($all);
			//3、依赖注入方法
			// $all=$request->param();
			// 使用助手函数
			$all=input('param.');
			var_dump($all);

		}
	}

 ?>