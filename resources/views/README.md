### Structure of Views Directory

You can find the following directories: 
- Layouts 
-> includes the master layout which loads the styles and scripts. This one is the main Template, where everything else getsadded in.

- Pages -> These are all pages, like the AgeChoice, which aren't affected by the age group

- admin -> these are all backend views, which are also not affected by the age

- age-layouts -> in this directory you can find the main layouts foreach age group, extending the master and the directories for each ageGroup with the specific views

