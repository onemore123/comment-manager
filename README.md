# Comment-manager
##### Guzzle client wrapper to add, update and get comments list

#### Sender class

**Create new Sender object**

It is possible to pass the optional host argument to class constructor (by default the host is *example.com*)
```
$sender = new Sender();
```

##### Add new comment
Method returns associative array
```
$sender->createComment(string $author, string $comment);
```

##### Get comments list
Method returns associative array with list of all comments. There is an optional argument *author* to get the specific comments only
```
$sender->getComments(string $author = null);
```

##### Update specific comment
Method returns associative array
```
$sender->updateComment(int $id, string $comment);
```

*NOTE:* at the moment no authentication is added.
