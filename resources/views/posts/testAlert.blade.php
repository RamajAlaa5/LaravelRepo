@extends('layouts.layout')

@section('content')



	<script>
		function geeks(msg, gfg) {
			var confirmBox = $("#container");

			/* Trace message to display */
			confirmBox.find(".message").text(msg);

			/* Calling function */
			confirmBox.find(".yes").unbind().click(function()
			{
			confirmBox.hide();
			});
			confirmBox.find(".yes").click(gfg);
			confirmBox.show();

			confirmBox.find(".no").unbind().click(function()
			{
			confirmBox.hide();
			});
			confirmBox.find(".no").click(gfg);
			confirmBox.show();
		}
	</script>
	<style>

		/* Body alignment */
		body {
			text-align: center;
		}

		/* Color for h1 tag */
		h1 {
			color: black;
		}

		/* Designing dialog box */
		#container {
			display: none;
			background-image: linear-gradient(to right, rgb(225, 223, 223),rgb(225, 223, 223) );
			background-size:cover;
			color: black;
			position: absolute;
			width: 350px;
			border-radius: 5px;
			left: 50%;
			margin-left: -160px;
			padding: 16px 8px 8px;
			box-sizing: border-box;
		}

		/* Designing dialog box's okay button */
		#container .yes {
			background-color: rgb(19, 126, 69);
			display: inline-block;
			border-radius: 6px;
			border: 2px solid white;
			padding: 5px;
			margin-right: -1px;
			text-align: center;
			width: 70px;
			float: right;
		}

		#container .no {
			background-color: red;
			display: inline-block;
			border-radius: 6px;
			border: 2px solid white;
			padding: 5px;
			margin-right: 10px;
			text-align: center;
			width: 95px;
			float: right;
		}

		#container .yes:hover {
			background-color:rgb(19, 126, 69); ;

		}

		#container .no:hover {
			background-color: red;

		}

		/* Dialog box message decorating */
		#container .message {
			text-align: left;
			padding: 10px 30px;
		}
	</style>

<body>
	<h1>Delete Alert</h1>
	<br><br>
	<div id="container">
		<div class="message">
		Are You Sure To Delete This Post?</div>
		<button class="no"><span style="color: white;">Delete</span></button>
        <button class="yes"><span style="color: white;">Cancel</span></button>

	</div>
	<input type="button" value="Subscribe" onclick="geeks();" />



@endsection
