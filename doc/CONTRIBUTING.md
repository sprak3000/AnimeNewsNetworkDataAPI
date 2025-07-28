# Contributing

So, you want to contribute to the project? Welcome!

Since this is an open source project, we would love to have your feedback! If
you are interested, we would also love to have your help! Whether helpful
examples to add to the docs, or FAQ entries, everything helps.

We have a few requests for those that are interested in contributing, and we've
outlined them below.

## The basics

This project uses the "GitHub" branching model. If you would like to read more
on some of the various branching models, the two big ElePHPants in the room are
the [GitHub Flow](http://scottchacon.com/2011/08/31/github-flow.html) and the
[Gitflow](http://nvie.com/posts/a-successful-git-branching-model/) branching
model.

## Developer setup

We use [composer](https://getcomposer.org/) to manage our dependencies.  We use
[task](https://taskfile.dev) as our task runner. Refer to the installation
documentation for both.

## Code quality

This project uses a variety of tools to ensure consistent code formatting and
code quality. Run these tools using

```shell
task lint
```

## Running tests

The most important part of changes are their tests. Every new feature or issue
being fixed should have a matching test. This project uses PHPUnit and Guzzle.
When you write your tests, please make sure they're in line with the existing
tests.

Please review our [Testing Documentation](TESTING.md) for more details.

## <a name="bug-reports"></a>Bug reports

When the inevitable happens, and you discover a bug in the documentation or the
code, please follow the process below to help us out.

* Search the existing issues to see if the issue has already been filed
* Make sure the issue is a bug and not simply a preference
* If you have found a new issue, please file it

From that point, if you are interested in contributing some code, ask in the
issue if we are willing to accept a failing test case, and/or a fix. If we are,
then follow the steps for contributing, and we can go from there!

## <a name="feature-requests"></a>Feature requests

Every new feature request will be scrutinized to make sure we are not going to
experience feature bloat. Every new feature should fit the Vision for the
project. If you have got an idea for a new feature and feel it fits the vision,
file an issue, and we can discuss it.

Make sure any feature request you make fits the
[INVEST](http://en.wikipedia.org/wiki/INVEST_(mnemonic)) mnemonic.

## <a name="pull-requests"></a>Pull requests

A well written pull request is a huge piece of the success of any open source
project. Please make sure to take the time to think out the request and
document/comment well. A good pull request should be the smallest successful
feature, akin to the [INVEST](http://en.wikipedia.org/wiki/INVEST_(mnemonic))
mnemonic used in scrum.

Make sure if you are not a project member and just getting started that you have
a related issue for your Pull Request and that a project owner approves the work
before putting the effort in to make the change. Most of the time as long as you
are following the project vision, we'll welcome additions, but it is better to
be safe than sorry.

Also, make sure your pull request is built with a compilation of great
[commit messages](http://tbaggery.com/2008/04/19/a-note-about-git-commit-messages.html).

The [Bower](https://github.com/bower/bower/blob/master/CONTRIBUTING.md) project
has awesome instructions for Pull Requests, I have added a copy here.

Adhering to the following this process is the best way to get your work included
in the project:

1. [Fork](http://help.github.com/fork-a-repo/) the project, clone your fork, and
   configure the remotes:

   ```shell
   # Clone your fork of the repo into the current directory
   git clone https://github.com/<your-username>/AnimeNewsNetworkDataAPI
   # Navigate to the newly cloned directory
   cd AnimeNewsNetworkDataAPI
   # Assign the original repo to a remote called "upstream"
   git remote add upstream https://github.com/sprak3000/AnimeNewsNetworkDataAPI
   ```

2. If you cloned a while ago, get the latest changes from upstream:

   ```shell
   git checkout master
   git pull upstream master
   ```

3. Create a new topic branch (off the main project development branch) to
   contain your feature, change, or fix:

   ```shell
   git checkout -b <topic-branch-name>
   ```

4. Make sure to update, or add to the tests when appropriate. Patches and
   features will not be accepted without tests. Run phpunit to make sure all
   tests pass after you've made changes. Please review our
   [Testing Documentation](TESTING.md) for more details.

5. Commit your changes in logical chunks. Please adhere to these [git commit
   message guidelines](http://tbaggery.com/2008/04/19/a-note-about-git-commit-messages.html)
   or your code is unlikely be merged into the main project. Use Git's
   [interactive rebase](https://help.github.com/articles/interactive-rebase)
   feature to tidy up your commits before making them public.

6. Locally merge (or rebase) the upstream development branch into your topic
   branch:

   ```shell
   git pull [--rebase] upstream master
   ```

7. Push your topic branch up to your fork:

   ```shell
   git push origin <topic-branch-name>
   ```

8. [Open a Pull Request](https://help.github.com/articles/using-pull-requests/)
    with a clear title and description.

9. If you are asked to amend your changes before they can be merged in, please
   use `git commit --amend` (or rebasing for multi-commit Pull Requests) and
   force push to your remote feature branch. You may also be asked to squash
   commits.

**IMPORTANT**: By submitting a patch, you agree to license your work under the
same license as that used by the project.
