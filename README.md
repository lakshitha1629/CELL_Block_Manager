1. Project Title	Cell Block Manager

2. Problem in Brief                                                                                                                                 
    In the current situation, there’s very poor communication between RNO Team Requestor and INOC Team Leader and most of the time INOC     Team Leader is not aware of their Request.
    No single system to capture cell block requests.                                                                                         Cellblock affects users and gives bad user experience, user unsatisfaction.
	Affect VIP users.
	High-risk operation.
	Previous bad experience on vendor cell block activities.
	Captured long term blocked cells.
	When considering the current system, the occurrence of human errors is ordinary and hard to handle manual data.

3. Proposed Solution
	We are going to develop a system that facilitates the interconnection between RNO Team Requestor and INOC Team Leader by a web application.
	It needs a central system to monitor and handle cell block requests properly.
	Maintain cell block requests.
	Monitor the response of the cell block requests.
	Clear view and searching facility of the block requests.
	Follow up pending works. (pending approval, pending block, pending unblock)
	Give the beep tone in new pending works.
	Analysis of cell block request. (request count, block pending request count, deblock pending request count, block count, deblock count)
	INOC Team Leader marks the request, bock or unblock by the system and sending the email to the Requestor.
	Vendor block requests need to be processed through the RNO Team Requestor. so, through this web, RNO Team Requestor can view vendor requests and approve for the process.

4. Requirements identification
4.1   Functional requirement
	Add and remove requests by RNO Team Requestor and Vendor. (single request or multi request)
	The vendor requests approval by the RNO Team Requestor.
	View all requests and responses of the requests.
	View and playing beep tone the new pending block and deblock counts.
	Keep records and update records of the cell block details. (block or unblock)
	Update cell block request single and multi-selection. (block or unblock)
	Search request, view all requests in the log table, view complete requests highlighted.

	Mail and SMS function-> A message is sent to the requestor about the response of the cell block request.
	Can export the records. (date range or all records as the excel sheet)
	View the analysis of cell block requests. (request count, block pending request count, deblock pending request count, block count, deblock count)

4.2 Non-functional requirements
	Usability. (Color combination is valid for even color-blind people, User interface responsive to any device)
	User-friendliness – adding icons and information messages.
	Increasing Performance. (AJAX form submit use to data insert and search, using table plugging)
	Security- prevent unauthorized access and SQL injection by using security functions.
	Data adding and update are not reflecting with other accounts.
	Reliability.

3.  User levels
	Admin
	INOC Team Leader
	RNO Team Requestor
	Vendor

4.  User Roles
	Admin
•	Admin can handle every user details including insert, delete and update.
•	Show the requests pending count.
•	Search the details of the cell block requests
•	Add or update cell block requests.
•	Export the excel sheet.
•	View the analysis of cell block requests.
•	Add users and reset the password.

	INOC Team Leader
•	Show the requests pending count.
•	Search the details of the cell block requests.
•	Update cell block requests. (block or deblock)
•	Sent a message to the requestor about the response of the cell block request.
•	Export the excel sheet.
•	View the analysis of cell block requests.

	RNO Team Requestor
•	Add the requests (single request or multi requests)
•	Remove the wrong requests.
•	View all user's requests and responses of the user requests. 
•	Show the pending approval requests.
•	Give approval to the vendor requests.

	Vendor
•	Add the requests (single request or multi requests).
•	Remove the wrong requests.
•	View all requests and responses of the user requests. 

           	

 
 

