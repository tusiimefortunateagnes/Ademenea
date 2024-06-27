    
    {{-- this script redirects users that are browsing pages without being logged in --}}
    
      @if (!Session::has('id'))
            <script>
		//alert("Redirecting you to the homepage");
		 window.location.href = "/login";
	         </script>  
            @endif