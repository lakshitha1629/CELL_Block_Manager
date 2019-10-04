### Cell Block Manager 

1. Project Title -> Cell Block Manager

2. Problem in Brief
	- In the current situation, there’s very poor communication between RNO Team Requestor and INOC Team Leader and most of the time INOC Team Leader is not aware of their Request.
	- No single system to capture cell block requests.
	- Cellblock affects users and gives bad user experience, user unsatisfaction.
	- Affect VIP users.
	- High-risk operation.
	- Previous bad experience on vendor cell block activities.
	- Captured long term blocked cells.
	- When considering the current system, the occurrence of human errors is ordinary and hard to handle manual data.

3. Proposed Solution
	- We are going to develop a system that facilitates the interconnection between RNO Team Requestor and INOC Team Leader by a web application.
	- It needs a central system to monitor and handle cell block requests properly.
	- Maintain cell block requests.
	- Monitor the response of the cell block requests.
	- Clear view and searching facility of the block requests.
	- Follow up pending works. (pending approval, pending block, pending unblock)
	- Give the beep tone in new pending works.
	- Analysis of cell block request. (request count, block pending request count, deblock pending request count, block count, deblock count)
	- INOC Team Leader marks the request, bock or unblock by the system and sending the email to the Requestor.
	- Vendor block requests need to be processed through the RNO Team Requestor. so, through this web, RNO Team Requestor can view vendor requests and approve for the process.

4. Requirements identification<br/><br/>
	4.1   Functional requirement<br/>
		- Add and remove requests by RNO Team Requestor and Vendor. (single request or multi request)<br/>
		- The vendor requests approval by the RNO Team Requestor.<br/>
		- View all requests and responses of the requests.<br/>
		- View and playing beep tone the new pending block and deblock counts.<br/>
		- Keep records and update records of the cell block details. (block or unblock)<br/>
		- Update cell block request single and multi-selection. (block or unblock)<br/>
		- Search request, view all requests in the log table, view complete requests highlighted.<br/>
		- Mail and SMS function-> A message is sent to the requestor about the response of the cell block request.<br/>
		- Can export the records. (date range or all records as the excel sheet)<br/>
		- View the analysis of cell block requests. (request count, block pending request count, deblock pending request count, block count, deblock count)<br/>

	4.2 Non-functional requirements<br/>
		- Usability. (Color combination is valid for even color-blind people, User interface responsive to any device)<br/>
		- User-friendliness – adding icons and information messages.<br/>
		- Increasing Performance. (AJAX form submit use to data insert and search, using table plugging)<br/>
		- Security- prevent unauthorized access and SQL injection by using security functions.<br/>
		- Data adding and update are not reflecting with other accounts.<br/>
		- Reliability.<br/>

5.  User levels
	- Admin
	- INOC Team Leader
	- RNO Team Requestor
	- Vendor
