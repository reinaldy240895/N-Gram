# README #
- [English Version](#english-version)
  - [Introduction](#introduction)
  - [Document Curating and Preprocessing](#document-curating-and-preprocessing)
  - [How to Use](#how-to-use)
  - [Live Demo](#live-demo)
  - [Credits](#credits)

## Introduction ##

An implementation of a HMM Ngram language model in php.
Currently implements basic NGram analysis, and provides an interface to generate text
with given first word and sentence length using Markov Chains Model based from N-Gram Probability. 

## Document Curating and Preprocessing ##

Documents for this corpus were Cited [here](https://github.com/felikjunvianto/korpus-plagiarisme-indonesia/tree/master/source-documents) acquired from following sources.

- translation of PAN CLEF articles,
- Indonesian blogs,
- other corpora ([Kompas](http://www.kompas.com/) articles & film reviews),
- [featured articles from Wikipedia Bahasa Indonesia](https://id.wikipedia.org/wiki/Wikipedia:Artikel_pilihan), and
- novels in Bahasa Indonesia (local & translated).

After the documents were collected, each document was preprocessed with following steps.

- performing normalization so that each line of the document contains maximum of 100 characters.
- removing extra space characters at the end of paragraph, in-between paragraphs, and before any punctuation marks.
- removing extra characters like `. , ? !`informal multiple character like: `aduuuuuuuuuuuuuuuuuh`
- replacing some non-ASCII characters with its ASCII counterpart, for example replacing `”` character inside document with `"` character.

**Document statistics**

- Source documents = **30**
## How to Use ##

To use this apps, first clone or download this git, run this git on ur localhost



## Live Demo ##
Live Demo Version: [here](https://nlplangmodel.000webhostapp.com/)

## Credits ##

- felikjunvianto, [Github](https://github.com/felikjunvianto)
- zacharski, [Github](https://github.com/zacharski/ngramAnalyzer)
- Hierapolis, [Github](https://github.com/lab2023/hierapolis)

This corpus is licensed under the **Creative Commons Attribution 4.0 International License**. To view a copy of this license, visit http://creativecommons.org/licenses/by/4.0/.
