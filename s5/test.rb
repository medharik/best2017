def test
	p "salut mon ami"
	p __FILE__
	p $0
end



if __FILE__ == $0
	test
end