<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>

	<%
	String contextPath = request.getContextPath();
	String pmsProd = "https://aepms.oraclecorp.com:4443/login.php";
	String pmsDev = "https://phoenix125912.ad1.fusionappsdphx1.oraclevcn.com:4443/login.php";
	String pmsApp = pmsProd;

	if (contextPath.contains("pms_dev")) {
		pmsApp = pmsDev;
	}

	//String pmsProd = "https://aepms.oraclecorp.com:4443/login.php";
	//String pmsDev = "https://phoenix125912.ad1.fusionappsdphx1.oraclevcn.com:4443/login.php";
	String value_11 = request.getHeader("idcs_remote_user") == null ? "" : request.getHeader("idcs_remote_user");

	String value_1 = request.getHeader("remote_user") == null ? "" : request.getHeader("remote_user");

	String value_2 = request.getHeader("OAM_REMOTE_USER") == null ? "" : request.getHeader("OAM_REMOTE_USER");

	String value_12 = request.getHeader("REMOTE_USER_GROUPS") == null ? "" : request.getHeader("REMOTE_USER_GROUPS");

	out.print("+++++++SSORedirectClient SITE JSP IDCS APPGATEWAY HEADER Values Start++++++++");

	out.print("Login Page : idcs_remote_user-User :: " + value_11);

	out.print("Login Page : REMOTE_USER_GROUPS :: " + value_12);

	out.print("Login Page : remote_user :: " + value_1);

	out.print("Login Page : OAM_REMOTE_USER-User :: " + value_2);

	out.print("+++++++IDCS APPGATEWAY HEADER Values END++++++++");

	Cookie oamRemoteUser = new Cookie("OAM_REMOTE_USER", request.getHeader("OAM_REMOTE_USER"));

	response.setHeader("OAM_REMOTE_USER", request.getHeader("OAM_REMOTE_USER"));
	response.setStatus(302);
	response.addCookie(oamRemoteUser);
	session.setAttribute("OAM_REMOTE_USER", request.getHeader("OAM_REMOTE_USER"));
	String redirectURL = pmsApp + "?OAM_REMOTE_USER=" + request.getHeader("OAM_REMOTE_USER");
	//String redirectURL = "https://faxodev.oci.oraclecorp.com:5443/login.php?OAM_REMOTE_USER="
	//		+ request.getHeader("OAM_REMOTE_USER");
	response.sendRedirect(redirectURL);
	%>


</body>
</html>