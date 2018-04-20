<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016082100306506",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEA6S59pfStTiydrFBFy2o/i+Rt+NursaeTwyn1iPsnABgIKf1C/fRRZBfBmWvT4Vyg5xKIgGDRvGifOkYEMwd7kAp9X0Ldw8GggQ7kYtFL5ESRy9LV4/3laVXPak5Y5p8AqgC/42AdZGQ0Qapmdi0ykZBGttk/L4q6U4fV/MfU6lfaVhgAQ50m8WwgxqmOxLrU7ePrJkUQ/KxdXdISk6FZbJFc+RsNgyzALe9n1cJYRwzDtGrb7cO9xJAxNJOztR9J8ZC5ulBM05aa0U2TXAxxBo80xf87GqHvRN9CZ4cd3Gt3hh54TTpdQopVD6Z1Bauv3lFl0jTPz6E0sccXnObBFwIDAQABAoIBAEVCo9uJQ3i209Z8uV5kHp/kp62FQggwqDkN23pmbv0eJj6ilSVtTkeWrtBtMK/9nWVFIfpPx7xYrwLWDSVDEbaFBxwmdkxQ1OXAkKGxXQNeQpfx9coUffG9pTAEOW+2xrG4K0bUI6bQBJ2EiY6Mejq2SerBuHzcjd+Ft0+v41P/VxxGGtas+y84WoF0psjA01o6j+/8L+1ObhIQqdJd24/Vudf9TSRpikOi3HmXnZ97W1qML68cf73LKCbG6dPxJVVgTNGsZneBPBiO5SaqgUcGnaxujTY69MtSVOEY3HlT/Y4yWpvDZZB6LxWYpQPRU6FDrX33st+SMO0899zFRcECgYEA9LyBqt4YWxjJ+w5eCSW47eDYNjxTCc/fk6op2SN3BAYGVhH+nfZOUhHTPuJdgtpAnil93g2907946tgreDuFPK/nOJVQp3Y1Iy3M/5inm5WCyddFPbWWs1X76Rqg3dqBcOdURXxzm2aR04K7oMPQbsVcVbwbEb9+5RFBAudD9ycCgYEA8+nYhZJyBK7K5KaNU7vJiQ8f7lMS7u5Tzj7dimILllGQL7pG5iamNpi3Iai4dXx18XBrSsrLdZNtT2+le3vFpOiUxpU24P5GkLvYWgkZc8LZl69p+6YCHrvmRAeEdr1xeI8q4AOykOLWxBkcqfUF5cSq6CNJ5A2YUqIM+IRUnJECgYEAoKpgNdw4ARX1A2wbL8Yj8YZ6aqCPoxFkpXxAnNw7ddi+sCKAFRNtt1Mca1wQJ6dAZJS4nN5IkIpSx1nCr9vjTEPud6cOm+FuYPngaqu83Nb6VaeNPUXI+VKpXg6tLPgVohk7qaJaAtsDQOfCZXgnjZDjXSVwX+ZnV9pL46wPYmECgYBsiqeb6StsAgyv654AoRRyNZTUDYvjX5NTuI4FwtO9NNahJpfeW1yj9xmnlNlhDt29b3WPdudLjyuZqelOJiox1H5AUK53OTBVwAHrLxlwdkk2Qw06uwk+fAdgRqgf3vXb3HoL7hlMeGVyJmqnBy50rSwQ2YNMRPB/9TUoclrkwQKBgQDRr3SyzM+64DPIzUR13pGk43kpRcJuSSdag4+CYCXEnO6ESL9E87pJp4zCSud7PYPOoR/n5ilZYbTLB2pC0nYgaGKHUhXV4oSAegnTjA1D+2qFUkHYa0BsmFr/Y4XXo0xH73Ekx0jW1RCuRUl/pSMFNyPt6veiZ/5N/M12yaJ/9w==",
		
		//异步通知地址
		'notify_url' => "http://118.31.45.231:8090/payment/notify",
		
		//同步跳转
		'return_url' => "http://118.31.45.231:8090",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA8wuvZUFPs6H5r3+RVUQy4QJiO7CBxNQ3lhw0UKP1s3CT28eHzVgIm+ZNBbWiSmLTYMFqMO467u9Wt9U2n5eK4VyBWg7kQ48hI7aeeOaKh4WuV3qo2F5+/5TxfQRczn9Jk4nG70Nu06UipP1utLzVoyOtWjq9kLGrb48QcbZeG+BWK3nMPPP4qjmHtOK7TK6r4ve/zDX1nUVs5rhwS2+lQcvQXxkMS6D1FDS9IK6sYUJE7UrhcUUwfxof1Nmjp9igTIBIRxw1Xu7AB2IA1Qmlyl4Ltpl7CTmLRoiG4T0cHxP/E0EHcJbQUUWuOQY8nDClOzzvXUPBoNS/8tOcSg6v1wIDAQAB",
		
	
);