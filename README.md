# Woo Fail2ban
## Description
<p align="center">This plugin register the IP address of all orders with "failed" status</p>

<!--ts-->
   * [Create Filter](#create_filter)
   * [Install plugin](#install_plugin)
   * [Create Rule](#create_rule)
<!--te-->
<h4 id="create_filter"> 
	Create filter
</h4>
<p>
  Create new filter file named "woofail2ban.conf" in filter.d directory, for example: /etc/fail2ban/filter.d/woofail2ban.conf with the following content:
  <p>[INCLUDES]<br>
[Definition]<br>
failregex = Failed &lt;HOST&gt;
</p>
</p>
<h4 id="install_plugin"> 
	Install the plugin
</h4>
<p>
  Install this plugin in your wordpress installation
</p>
</p>
<h4 id="create_rule"> 
	Create rule
</h4>
<p>
  # service name<br>
[woofail2ban]<br>
# turn on /off<br>
enabled  = true<br>
# ports to ban (numeric or text)<br>
port     = http,https<br>
# filter from previous step<br>
filter   = woofail2ban<br>
# file to parse<br>
logpath  = <b>PATH_TO_WORDPRESS</b>/wp-content/plugin/woo-fail2ban/ip_failed_orders.log<br> 
# ban rule:<br>
# 5 times on 1 minute<br>
maxretry = 5<br>
findtime = 60<br>
# ban on 10 minutes<br>
bantime = 600<br>


</p>
</p>
