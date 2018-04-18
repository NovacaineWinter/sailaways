A customer has saved a configuration on Sailaways.net, 
<br><br>
their details are as follows;
<br><br>
Name:  {{{$config->name}}} <br>
Email:  {{{$config->name}}} <br>
Requested Consulatation: @if($config->can_contact) Yes @else No @endif<br>
<br>

You can view their configuration <a href="{{{ url('/configure?code='.$config->code) }}}">HERE</a>

<br><br><br><br>

This enquiry is visible on the dashboard of Sailaways.net, The ID for this Enquiry is {{{$config->id}}}