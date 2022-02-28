/* HOW MANY TOTAL HOURS WERE SPENT ON EACH BUG? */
SELECT bug_id, SUM(hours) as hours_worked_on_bug
	FROM hourLog
	GROUP BY bug_id

/* HOW MUCH MONEY DID EACH BUG COST TO FIX? */
SELECT hourLog.bug_id, SUM(users.hourly_rate * hourLog.hours) as cost_to_fix
	FROM hourLog
	INNER JOIN users ON hourLog.user_id = users.id
	GROUP BY hourLog.bug_id


/* WHAT WAS THE AVERAGE TIME TO FIX A BUG */
SELECT bug_id, AVG(hours) as average_hours_worked
	FROM hourLog
	GROUP BY bug_id

/* WHAT WAS THE AVERAGE COST TO FIX A BUG */
SELECT hourLog.bug_id, AVG(users.hourly_rate * hourLog.hours) as AVG_cost_to_fix
	FROM hourLog
	INNER JOIN users on hourLog.user_id = users.id
	GROUP BY hourLog.bug_id
	

/*NOTE: i dont know how to get my results of the queries to be simple decimals with 2 places past decimal. i tried to do cast, and a few other things I looked up but could not get it to work
	I assume that I could take care of this in an application or with python code minipulating the response back I also used https://www.w3resource.com/sql/arithmetic-operators/sql-arithmetic-operators.php#:~:text=The%20SQL%20multiply%20(%20*%20)%20operator,or%20more%20expressions%20or%20numbers
	as a refrence to help with this assignment*/