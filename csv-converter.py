#!/usr/bin/python
# coding: utf-8

import sys

inputname = sys.argv[1]
outputname = sys.argv[2]

infile  = open(inputname, 'r')
outfile = open(outputname, 'w')

for line in infile:
    if line.startswith('-'):
        continue
    outfile.write(line.replace('|', ',').replace(' ',''))

infile.close()
outfile.close()
