<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title>Password Recovery</title>
	</head>
		<body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;">
				<div style="padding:10px; background:#D3D3D3; font-size:30px; color:#800080">
				<a href="https://astrooptions.com"><img src="https://astrooptions.com/img/logo_color.png" width="35" height="35" alt="Astro Options" style="border:none; float:left;"></a>
					Astro Options Password Recovery
				</div>
				<div style="padding:24px; font-size:13px;">
					<span style="font-weight:bold">{{$name}}</span>, you requested to reset your password. Ignore this mail if you never did or click on the link below to reset your password
					<p>Link: <a href="https://astrooptions.com/login/token/check?token={{$token}}&email={{$email}}">https://astrooptions.com/login/token/check?token={{$token}}&email={{$email}}</a></p>
				</div>
				<p><span style="font-weight:bold">Astro Options Team.</span></p>
		</body>
</html>