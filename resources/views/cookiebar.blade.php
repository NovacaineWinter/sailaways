    <div id="cookiebar">


        <div id="cookieHeader">
            {{{ env('SITE_NAME') }}}
        </div>

        <div id="cookieExplainer">
            
            <h3>Welcome to {{{ env('SITE_NAME') }}}</h3>
        
            <p>We have many useful features on this website that help you to get your ideal boat out on the water. Many of these features rely on the use of cookies etc to allow them to function, you can use the site without giving us permission to set cookies, but many of the features will not work.</p>
            
            <div id="">
                <h3>Do you consent to us setting cookies?</h3>
                               
                    <button class="cookiebuttons" id="rejectCookies">No, I do not</button>
                    <button class="cookiebuttons" id="acceptCookies">Yes, I Give Permission</button>
                
                 <p> 
                    You can find out how we use cookies <a href="{{{ url('cooekiePolicy') }}}">on this link.</a> You can change your preferences at any time using the <a href="{{{ url('settings') }}}">settings link</a> in the footer. You can see how we manage your data <a href="{{{url('/dataprotection')}}}">On this link.</a>
                </p>

            </div>            
        </div>
    </div>