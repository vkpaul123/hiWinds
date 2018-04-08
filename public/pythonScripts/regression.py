import os
os.environ.setdefault('PATH', '')

import xlrd
import pandas as pd
import math
import numpy as np
import sys
from sklearn import preprocessing, cross_validation, svm 
from sklearn.linear_model import LinearRegression 
from matplotlib import style

style.use('ggplot')

#filepath = sys.argv[1]
draft1 = pd.read_csv(sys.argv[1])
#print(draft1.head(6))
#for row in draft1:
df1= draft1[['humidity','temperature',]]
#df1 = df.loc[:1:3]
#print(df1)

predict_power = draft1[['power']] 
#print(predict_power)
#[list(map(int, x)) for x in power]
#df.fillna(-999999,inplace="True")
#predict_power.split("","")
forecast_out = int(math.ceil(0.01 * len(df1)))
print(forecast_out)
#forecast_out.split("","")
#for rows in predict_power:
df1['Prediction'] = (predict_power).shift(-forecast_out)
#df1.dropna(inplace=True)
#print(df1.head)

X = np.array(df1.drop(['Prediction'],1))
#X = preprocessing.scale(X)
X = X[:-forecast_out]
X_lately = X[-forecast_out:]

df1.dropna(inplace=True)
y =  np.array(df1['Prediction'])
y = np.array(df1['Prediction'])

#print(len(X), len(y))

X_train,X_test,y_train,y_test = cross_validation.train_test_split(X, y, test_size=0.1)
clf = LinearRegression()
clf.fit(X_train, y_train)
accuracy = clf.score(X_test, y_test)
#print(accuracy)

forecast_set = clf.predict(X_lately)
print(forecast_set, accuracy, forecast_out)

#df1['Forecast'] = np.nan