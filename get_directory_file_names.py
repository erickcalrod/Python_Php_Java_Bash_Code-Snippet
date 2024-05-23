from selenium import webdriver

def get_dir_file_names(url):
    driver = webdriver.Chrome()

    driver.get(url)

    links = driver.find_element_by_tag('a')

    file_names = []
    for link in links:
        href = link.get_att('href')
    if href:
        file_name = href.split('/')[-1]
        if file_name:
            file_names.append(file_name)

    driver.quit()

    return file_names

url = 'https://gentoo.osuosl.org/distfiles/'

file_names = get_dir_file_names(url)
print("Files: ", file_names)