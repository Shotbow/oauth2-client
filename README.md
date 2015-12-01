# Sign in with Shotbow

After a quick few weeks of development time, The Shotbow Web Development Team is pleased to announce the release of a new and *incredibly* useful feature:
 
![](https://i.imgur.com/PWkVPLt.png)
 
One of the large problems of the Minecraft community has always been authenticating your Minecraft account on the web. Many Networks, small servers, and other communities rely on you connecting to a Minecraft server temporarily in order to validate and setup your account. Even worse, some communities require you to login using your Mojang credentials as they are unable to procure a Minecraft server simply for authentication.
 
This is a problem I personally encountered when creating the community website for what would grow to be the largest and longest lasting guild in MineZ - *The Night's Watch* - and something I begged the Shotbow team for at the time (long before I became admin).
 
Up until last Thursday, that community still required potential members to register and authenticate by entering their Mojang credentials - but this is no longer necessary thanks to this brand new *Sign in with Shotbow* feature.
 
That's why I'm pleased to announce *[The Night's Watch](https://minez-nightswatch.com/)* as the launch partner for this wonderful feature, and the first of many implementations.
 
As this feature is brand new, you should consider it in *Closed Beta Testing.* Potential implementors are encouraged to [contact Navarr](http://shotbow.net/forum/conversations/add?to=Navarr) with their planned implementation details if they'd like to be an early adopter of this technology.
 
-----
 
For developers:
 
This technology uses the OAuth2 specification and reveals (with user permission) several details including their last known Minecraft username (by Shotbow), their Minecraft UUID, their Shotbow ID, and (with an additional scope) their email address. Additional information and API access is being planned and considered, and we'd love to hear your ideas and desired implementations to help shape our API.
 
-----
 
For players:
 
When a website implements this technology, you will likely see a "Sign in with Shotbow" button or other indication of logging in using Shotbow, before being brought to a page that will look similar to this:
 
![](https://i.imgur.com/CkqSaOW.png)
 
Please - Always carefully review the information that the app, website, or community is requesting and ensure that you trust that group with the access you are granting them. With the release of this technology, a third party website should never ask you for your Shotbow password - and the Shotbow staff will never ask you for your password.
