# Дополнительные параметры git commit

```bash
git commit -a -m "Сообщение коммита" 
# то же самое, что последовательное выполнение 
# git add . и git commit -m "Сообщение коммита"
```

---

```bash
git commit --amend -m "Новое сообщение коммита" 
# дополняет последний коммит, добавляя в него "свежие" изменения. 
# Также, меняет сообщение последнего коммита. Новый коммит не создается!
```