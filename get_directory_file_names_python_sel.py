from selenium import webdriver
from selenium.webdriver.common.by import By

def get_dir_file_names(url):
    driver = webdriver.Chrome()

    driver.get(url)

    links = driver.find_elements(By.CSS_SELECTOR, 'td > a')

    file_names = []

    for link in links:
        href = link.get_attribute('href')
        if href:
            file_name = href.split('/')[-1]
            if file_name:
                file_names.append(file_name)

    driver.quit()

    #return len(file_names)
    return file_names


url = 'https://gentoo.osuosl.org/distfiles/'

file_names = get_dir_file_names(url)
print("Files: ", file_names)