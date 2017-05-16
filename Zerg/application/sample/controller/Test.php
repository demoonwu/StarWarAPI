<?php 
	namespace app\sample\controller;
	use think\Request;
	use app\sample\validate\TestValidate as trySomething;//要加名称,这个是PHP5.3后面新加的内容  大家感受下

	//use think\Validate;
	/**
	* 作者：吴咏蔚
	*/
	class Test
	{
		public function hello()
		{
			return "hello 吴咏蔚";
		}
		public function getInfo(){
			phpinfo();
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
		public function tryValidate(){


			// 以下是使用独立验证的方法
			$date = array(
				'name' =>'demoonwu' , 
				'address' =>'whaley' ,
				'email' => 'demoonwu@foxmail.com' 
				);
			// 以下为使用独立验证的方法
/*			$validate=new Validate([
				'name' =>'require|max:10' ,
				'address'=>'require',
				'email' =>'email' 
				]);*/
			// 以下为使用验证器TestValidate 的方法
			$validate=new trySomething();
//			var_dump($validate->batch()->check($date));
            $result=$validate->batch()->check($date);
			var_dump($validate->getError());
			// var_dump($validate);

		}
	}

 ?>