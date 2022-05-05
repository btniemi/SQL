import json


def runTest():
    print("Starting Test ...")
    # General
    areArraysSameSize([1, 2, 3], [5, 6, 15])  # Should print True
    areArraysSameSize([1, 2, 3], [5, 6, 15, 32])  # Should print False
    countDistinctValuesInArray([1, 2, 1, 3, 4, 2])  # Should print 4
    printOnlyEvenNumbers5Through27()  # Should print 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26
    printHumanYearsForDogYears(7)  # Should print 41

    # More WPG specific
    getVoltageForVacuumLevel(0)  # Should print 1.0
    getVoltageForVacuumLevel(16)  # Should print 3.139...
    getVoltageForVacuumLevel(29.92)  # Should print 5.0

    json_data = """{
        "0": { "imrPartID" : "59915MM", "imrPartRevisionID" : "000", "imrQuantityOnHand" : 2 },
        "1": { "imrPartID" : "59915MM", "imrPartRevisionID" : "001", "imrQuantityOnHand" : 10 },
        "2": { "imrPartID" : "59915MM", "imrPartRevisionID" : "002", "imrQuantityOnHand" : 5 },
        "3": { "imrPartID" : "59915", "imrPartRevisionID" : "000", "imrQuantityOnHand" : 100 },
        "4": { "imrPartID" : "59915", "imrPartRevisionID" : "001", "imrQuantityOnHand" : 50 },
        "5": { "imrPartID" : "64456B", "imrPartRevisionID" : "000", "imrQuantityOnHand" : 200 }
    }"""
    sumQuantityOnHandForGivenPartAndRevision("59915MM", "", json_data)  # Should print 17
    sumQuantityOnHandForGivenPartAndRevision("59915", "001", json_data)  # Should print 50
    sumQuantityOnHandForGivenPartAndRevision("64456B", "", json_data)  # Should print 200
    sumQuantityOnHandForGivenPartAndRevision("12345", "001", json_data)  # Should print "ERR"
    sumQuantityOnHandForGivenPartAndRevision("12345", "", json_data)  # Should print "ERR"
    sumQuantityOnHandForGivenPartAndRevision("64456B", "001", json_data)  # Should print "ERR"
    print("Done!")


def areArraysSameSize(arr1, arr2):
    # Define this function
    array1 = len(arr1)
    array2 = len(arr2)
    if array1 == array2:
        same_size = "true"
    else:
        same_size = 'false'

    # Sample Print statement:
    print("Array same size? " + str(same_size))
    pass


def countDistinctValuesInArray(arr):
    # Define this function
    num_vals = []
    for x in arr:
        if x in num_vals:
            # do nothing
            pass
        else:
            num_vals.append(x)
    # Sample Print statement:
    print("Number of unique values: " + str(len(num_vals)))
    pass


def printOnlyEvenNumbers5Through27():
    # Define this function
    print("Even numbers 5 - 27:")
    x = 5
    while x <= 27:
        if x % 2 == 0:
            print(x)
        x += 1

    pass


def printHumanYearsForDogYears(dog_years):
    # Define this function
    # Assume for the first two years, the dog ages 10.5 human years. After that, the dog
    # ages 4 human years.

    if dog_years <= 2:
        human_years = dog_years * 10.5
    elif dog_years > 2:
        human_years = 21.0
        dog_years = dog_years - 2
        yearsToAdd = dog_years * 4
        human_years = human_years + yearsToAdd

    # Sample Print statement:
    print("Human years: " + str(human_years))
    pass


def getVoltageForVacuumLevel(vac_level):
    # Define this function
    # Assume a vacuum sensor has a linear response that outputs 1V when the vacuum level is 0 and 5V
    # when the vacuum level is 29.92.
    if vac_level == 0:
        volts_at_vac_level = 1
    else:
        volts_at_vac_level = vac_level * 0.133
        volts_at_vac_level = volts_at_vac_level + 1

    # Sample Print statement:
    print("Volts at " + str(vac_level) + " inhg: " + str(volts_at_vac_level))
    pass


def sumQuantityOnHandForGivenPartAndRevision(part, rev, json_data):
    # Define this function
    # - In the sample JSON data above, multiple part revisions can belong to a single part ID, and there cannot be duplicate part/revision pairs.
    # - Each revision has an associated quantity on hand.
    # - If a part and revision is specified in the arguments, this function should print the given part/revision pair's quantity on hand if it can be found.
    # - If only a part ID and no revision is specified, print the sum of quantity on hand for all revisions for the given part ID if it is found.
    # - If Part ID or Part / Rev pair is not found in the JSON data, print "ERR".

    # Convert the supplied string of JSON data into a Python data structure so it is easier to parse.
    data = json.loads(json_data)
    qty = 0

    for key in data:
        if data[key]['imrPartID'] == part and data[key]['imrPartRevisionID'] == rev:
            qty = qty + data[key]['imrQuantityOnHand']
        elif data[key]['imrPartID'] == part and rev == '':
            qty = qty + data[key]['imrQuantityOnHand']
        elif data[key]['imrPartID'] != part and data[key]['imrPartRevisionID'] != rev:
            pass

    # Sample Print statement:
    if qty == 0:
        print("Err")
    else:
        print("<" + part + "> / Rev <" + rev + "> qty on hand: " + str(qty))

runTest()