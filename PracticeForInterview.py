#reversing strings in different ways
# string = input('please type a string...')
#
# string_to_split = string
#
# def split_string(string):
#     return [char for char in string]
#
# def reverse_sting1(string):
#     return string[::-1]
#
# stack = []
# n = len(string)
# revers_string_stack = ''
#
# def add_to_stack(stack, item):
#     stack.append(item)
#
# def remove_from_stack(stack):
#     return stack.pop()
#
# for i in range(n):
#     add_to_stack(stack, string[i])
#
# print(stack, 'stack with string in it')
#
# for i in range(n):
#     revers_string_stack += remove_from_stack(stack)
#
#
# print(stack, 'stack after pop')
# print(revers_string_stack, 'reversed string with stack')
# print(split_string(string_to_split), 'list')
# print(reverse_sting1(string_to_split), 'reversed string')
# print(list(string_to_split), 'this is just the list of the initial string casted')

#count number of bits for each number in binary

# def countBits(n):
#     res = []
#     for i in range(n+1):
#         res.append(format(i, 'b').count('1'))
#     return res
#
# print(countBits(2))
#
# x = format(18, 'b')
# y = format(18, 'b').count('1')
# z = format(20, 'b')
# count = z.count('1')
# print(x)
# print(y)
# print(count)

#WHATS NEXT
from operator import index

# nums = [3,3]
# target = 6
#
# def twoSum(list, target):
#     res = []
#     first = 0
#     n = len(nums)
#
#     while first < n:
#         second = first + 1
#         while second < n:
#             sum = nums[first] + nums[second]
#             if sum == target:
#                 res.append(first)
#                 res.append(second)
#             second += 1
#         first += 1
#
#     return res

    # res = []
    # n = len(nums)
    # i = 0
    #
    # while i < n:
    #     j = i + 1
    #     while j < n:
    #         sum = nums[i] + nums[j]
    #         if sum == target:
    #             res.append(i)
    #             res.append(j)
    #         j += 1
    #     i += 1
    #
    # return res

#print(twoSum(nums, target))

dict = {'key1' : "hello", 'key2': "goodbye"}
for i in dict:
    print(dict[i])

nums = [3,2,4]
num_sum = 6


def twoSum(list_nums, target):
    val_to_index = {}
    for i in range(len(list_nums)):
        if target - list_nums[i] in val_to_index: #looking at key which is math part
            return [val_to_index[target-list_nums[i]],i]
        val_to_index[list_nums[i]] = i #saving the key as the value in list and index as value of that list because want that index value

x = twoSum(nums,num_sum)
print(x)